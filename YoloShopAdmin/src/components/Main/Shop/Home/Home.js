import React, { Component } from 'react';
import { Text, View, Dimensions, StyleSheet, ListView } from 'react-native';
import getStats from '../../../../api/getStats'

export default class CommentScreen extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      stats: [],
      comments: [],
      orders: []
    }
  }
  componentDidMount() {
    getStats()
      .then(res => {
        this.setState({
          stats: res.list
        })
      });
    setInterval(function () {
      getStats()
        .then(res => {
          this.setState({
            stats: res.list
          })
        });
    }.bind(this), 30000)
  }
  render() {
    const { wrapper, main, StatsViewStyle } = styles;
    const { stats } = this.state;
    return (
      <View style={wrapper}>
        <Text style={{ textAlign: 'center', fontSize: 20, fontWeight: 'bold', backgroundColor: '#ffd', borderBottomWidth: 1 }}>Thống kê hệ thống</Text>
        <View style={StatsViewStyle}>
          <Text>Tổng doanh thu: <Text style={{fontWeight:"bold"}}>{stats.amount_total == null ? 0 :
            parseFloat(stats.amount_total).toFixed(0).replace(/./g, function (c, i, a) {
              return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
            })
          } Đ</Text></Text>
        </View>
        <View style={StatsViewStyle}>
          <Text>Tổng doanh tháng: <Text style={{fontWeight:"bold"}}>{stats.tongtien_thang == null ? 0 :
            parseFloat(stats.tongtien_thang).toFixed(0).replace(/./g, function (c, i, a) {
              return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
            })
          } Đ</Text></Text>
        </View>
        <View style={StatsViewStyle}>
          <Text>Doanh thu hôm nay: <Text style={{fontWeight:"bold"}}>{stats.amount_to_day == null ? 0 :
            parseFloat(stats.amount_to_day).toFixed(0).replace(/./g, function (c, i, a) {
              return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
            })
          } Đ</Text></Text>
        </View>
        <View></View>
        <View style={StatsViewStyle}>
          <Text>Tổng số bình luận: <Text style={{fontWeight:"bold"}}>{stats.total_comment == null ? 0 : stats.total_comment}</Text></Text>
        </View>
        <View style={StatsViewStyle}>
          <Text>Tổng số giao dịch: <Text style={{fontWeight:"bold"}}>{stats.total_transaction == null ? 0 : stats.total_transaction}</Text></Text>
        </View>
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
    backgroundColor: '#fff'
  },
  StatsViewStyle: {
    backgroundColor: '#fff',
    borderBottomWidth: 1,
    padding: 10
  }
})
