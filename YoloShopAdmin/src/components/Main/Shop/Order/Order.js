import React, { Component } from 'react';
import { Text, View, Dimensions, StyleSheet, ListView } from 'react-native';
import getOrders from '../../../../api/getOrders'

export default class CommentScreen extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      orders: []
    }
  }
  componentDidMount() {
    getOrders()
      .then(res => {
        this.setState({ orders: res.list })
      });

    setInterval(function () {
      getOrders()
        .then(res => {
          this.setState({ orders: res.list })
        });
    }.bind(this), 5000)
  }
  render() {
    const { wrapper, main, OrderViewStyle } = styles;
    const { orders } = this.state;
    return (
      <View style={wrapper}>
        <Text style={{ textAlign: 'center', fontSize: 20, fontWeight: 'bold', backgroundColor: '#ffd', borderBottomWidth: 1 }}>Đơn hàng</Text>
        <ListView
          contentContainerStyle={main}
          enableEmptySections
          dataSource={new ListView.DataSource({ rowHasChanged: (r1, r2) => r1 !== r2 }).cloneWithRows(orders)}
          renderRow={order => (
            <View style={OrderViewStyle}>
              <Text>Đơn hàng: <Text style={{fontWeight:"bold"}}>{order.transaction_id}</Text> - Tên mặt hàng: <Text style={{fontWeight:"bold"}}>{order.product_name}</Text></Text>
              <Text>Số lượng: <Text style={{fontWeight:"bold"}}>{order.qty}</Text> - Tổng cộng : <Text style={{fontWeight:"bold"}}>{
                parseFloat(order.amount).toFixed(0).replace(/./g, function (c, i, a) {
                  return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
                })
              } Đ</Text></Text>
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
  OrderViewStyle: {
    backgroundColor: '#fff',
    borderBottomWidth: 1,
    padding: 10
  }
})
