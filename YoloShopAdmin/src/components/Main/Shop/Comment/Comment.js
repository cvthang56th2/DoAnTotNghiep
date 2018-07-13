import React, { Component } from 'react';
import { Text, View, Dimensions, StyleSheet, ListView, TouchableOpacity, Button } from 'react-native';
import getComments from '../../../../api/getComments';

export default class CommentView extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      comments: [],
    }
  }

  componentDidMount() {
    getComments()
      .then(res => {
        this.setState({ comments: res.list })
      });

    setInterval(function () {
      getComments()
        .then(res => {
          if (res.list.length != this.state.comments.length)
            this.setState({ comments: res.list })
        });
    }.bind(this), 5000)
  }

  render() {
    const { wrapper, main, CommentViewStyle } = styles;
    const { comments } = this.state;
    return (
      <View style={wrapper}>
        <Text style={{ textAlign: 'center', fontSize: 20, fontWeight: 'bold', backgroundColor: '#ffd', borderBottomWidth: 1 }}>Bình luận</Text>
        <ListView
          contentContainerStyle={main}
          enableEmptySections
          dataSource={new ListView.DataSource({ rowHasChanged: (r1, r2) => r1 !== r2 }).cloneWithRows(comments)}
          renderRow={comment => (
            <View style={CommentViewStyle}>
              <Text>Sản phẩm: <Text style={{fontWeight:"bold"}}>{comment.product.name}</Text></Text>
              <Text>Người bình luận: <Text style={{fontWeight:"bold"}}>{comment.user_name}</Text></Text>
              <Text><Text style={{fontWeight:"bold"}}>Nội dung:</Text> {comment.content}</Text>
              <Text>Thời gian: <Text style={{fontWeight:"bold"}}>{comment.created}</Text></Text>
            </View>
          )}
        />
      </View>
    );
  }
}

const { width } = Dimensions.get('window');

const styles = StyleSheet.create({
  wrapper: {
    flex: 1,
    backgroundColor: '#fff'
  },
  main: {
    width: width,
    backgroundColor: '#DFDFDF'
  },
  CommentViewStyle: {
    backgroundColor: '#fff',
    borderBottomWidth: 1,
    padding: 10
  }
})
