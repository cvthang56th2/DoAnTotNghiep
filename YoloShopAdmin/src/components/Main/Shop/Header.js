import React, { Component } from 'react';
import {
  View, Text, Image, Dimensions, StyleSheet
} from 'react-native';
import icLogo from '../../../media/YoloBlack.png'

const { height } = Dimensions.get('window');

export default class Header extends Component {
  constructor(props) {
    super(props);
  }

  render() {
    const { wrapper, row1, iconStyle, titleStyle } = styles;
    return (
      <View style={wrapper}>
        <View style={row1}>
          <Image source={icLogo} style={{ width: 40, height: 40 }} />
          <Text style={titleStyle}>Yolo Shop</Text>
          <Text style={{color: "white", fontSize: 15}}>Admin</Text>
        </View>
      </View>
    );
  }
}

const styles = StyleSheet.create({
  wrapper: {
    height: height / 8,
    backgroundColor: '#34B089',
    padding: 10,
    justifyContent: 'space-around',
  },
  row1: { flexDirection: 'row', justifyContent: 'space-between', alignItems: 'center' },
  textInput: {
    height: height / 23,
    backgroundColor: '#FFF',
    paddingLeft: 10,
    paddingVertical: 0,
    marginTop: 10
  },
  titleStyle: { color: '#FFF', fontSize: 20, fontWeight: "bold" },
  iconStyle: { width: 25, height: 25 }
});
