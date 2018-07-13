import React, { Component } from 'react';
import {
    View, Image, StyleSheet, Alert, BackHandler,
} from 'react-native';
import TabNavigator from 'react-native-tab-navigator';
import Header from './Header';
import Home from './Home/Home';
import Comment from './Comment/Comment';
import Order from './Order/Order';

import homeIconS from '../../../media/home.png';
import homeIcon from '../../../media/home0.png';
import orderIconS from '../../../media/order.png';
import orderIcon from '../../../media/order0.png';
import commentIconS from '../../../media/comment.png';
import commentIcon from '../../../media/comment0.png';

import getComments from '../../../api/getComments';
import getOrders from '../../../api/getOrders';

class Shop extends Component {
    constructor(props) {
        super(props);
        this.state = {
            selectedTab: 'home',
            comments: [],
            orders: []
        };
    }

    handleBackButton() {
        Alert.alert(
            'Chú ý:',
            'Bạn muốn thoát chương trình?',
            [
                { text: 'Có', onPress: () => BackHandler.exitApp() },
                { text: 'Không' }
            ],
            { cancelable: false }
        );
        return true;
    }

    componentDidMount() {
        BackHandler.addEventListener('hardwareBackPress', this.handleBackButton);
        
        getOrders()
        .then(res => {
          this.setState({ orders: res.list })
        });
        
        getComments()
        .then(res => {
            this.setState({ comments: res.list })
        });

        setInterval(function () {
            getComments()
                .then(res => this.setState({ comments: res.list }))
            getOrders()
                .then(res => this.setState({ orders: res.list }));
        }.bind(this), 30000)
    }


    render() {
        const { iconStyle } = styles;
        const { selectedTab, orders, comments } = this.state;
        return (
            <View style={{ flex: 1, backgroundColor: '#DBDBD8' }}>
                <Header />
                <TabNavigator>
                    <TabNavigator.Item
                        selected={selectedTab === 'home'}
                        title="Trang chủ"
                        onPress={() => this.setState({ selectedTab: 'home' })}
                        renderIcon={() => <Image source={homeIcon} style={iconStyle} />}
                        renderSelectedIcon={() => <Image source={homeIconS} style={iconStyle} />}
                        selectedTitleStyle={{ color: '#34B089', fontFamily: 'Avenir' }}
                    >
                        <Home />
                    </TabNavigator.Item>

                    <TabNavigator.Item
                        selected={selectedTab === 'order'}
                        title="Đơn hàng"
                        onPress={() => this.setState({ selectedTab: 'order' })}
                        renderIcon={() => <Image source={orderIcon} style={iconStyle} />}
                        renderSelectedIcon={() => <Image source={orderIconS} style={iconStyle} />}
                        badgeText={orders.length}
                        selectedTitleStyle={{ color: '#34B089', fontFamily: 'Avenir' }}
                    >
                        <Order />
                    </TabNavigator.Item>

                    <TabNavigator.Item
                        selected={selectedTab === 'comment'}
                        title="Bình luận"
                        onPress={() => this.setState({ selectedTab: 'comment' })}
                        renderIcon={() => <Image source={commentIcon} style={iconStyle} />}
                        renderSelectedIcon={() => <Image source={commentIconS} style={iconStyle} />}
                        badgeText={comments.length}
                        selectedTitleStyle={{ color: '#34B089', fontFamily: 'Avenir' }}
                    >
                        <Comment />
                    </TabNavigator.Item>
                </TabNavigator>
            </View>
        );
    }
}

const styles = StyleSheet.create({
    iconStyle: {
        width: 20, height: 20
    }
});

export default Shop;
