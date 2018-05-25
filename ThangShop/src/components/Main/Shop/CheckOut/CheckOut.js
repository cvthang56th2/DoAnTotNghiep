import React, { Component } from 'react';
import { View, TextInput, Text, TouchableOpacity, StyleSheet, Image } from 'react-native';
import backList from '../../../../media/appIcon/backList.png';
import global from '../../../global';
import getToken from '../../../../api/getToken';
import checkLogin from '../../../../api/checkLogin';

export default class SignIn extends Component {
    constructor(props) {
        super(props);
        this.state = {
            name: '',
            email: '',
            address: '',
            phone: '',
            user: global.user
        };
    }

    async onSendOrder() {
        try {
            const token = await getToken();
            const arrayDetail = this.props.cartArray.map(e => ({
                id: e.product.id,
                quantity: e.quantity
            }));
            const kq = await sendOrder(token, arrayDetail);
            if (kq === 'THEM_THANH_CONG') {
                Alert.alert(
                    'Notice',
                    'Send order Successfully',
                    [
                        { text: 'OK' }
                    ],
                    { cancelable: false }
                );
                this.removeAllProduct();
            } else {
                console.log('THEM THAT BAI', kq);
            }
        } catch (e) {
            console.log(e);
        }
    }
    goBack() {
        const { navigator } = this.props;
        navigator.pop();
    }

    render() {
        const { inputStyle, bigButton, buttonText, wrapper, header, backStyle } = styles;
        const { email, address, name, phone, user } = this.state;
        const { cartArray } = this.props;
        const arrTotal = cartArray.map(e => e.product.price * e.quantity);
        const total = arrTotal.length ? arrTotal.reduce((a, b) => a + b) : 0;
        console.log(total);
        return (
            <View style={wrapper}>
                <TouchableOpacity onPress={this.goBack.bind(this)}>
                    <View style={{ flexDirection: 'row' }}>

                        <Image source={backList} style={backStyle} />
                        <Text style={{ color: '#fff', fontSize: 20 }}>BACK TO CART</Text>
                    </View>

                </TouchableOpacity>
                <View>

                    <View style={{ alignItems: 'center', marginBottom: 20 }}>
                        <Text style={{ color: '#fff', fontSize: 20 }}>CHECK OUT</Text>
                    </View>
                    <TextInput
                        style={inputStyle}
                        placeholder="Enter your name"
                        value={user ? user.name : ''}
                        onChangeText={text => this.setState({ name: text })}
                        underlineColorAndroid="transparent"
                    />
                    <TextInput
                        style={inputStyle}
                        placeholder="Enter your email"
                        value={user ? user.email : ''}
                        onChangeText={text => this.setState({ email: text })}
                        underlineColorAndroid="transparent"
                    />
                    <TextInput
                        style={inputStyle}
                        placeholder="Enter your address"
                        value={user ? user.address : ''}
                        onChangeText={text => this.setState({ address: text })}
                        underlineColorAndroid="transparent"
                    />
                    <TextInput
                        style={inputStyle}
                        placeholder="Enter your phone number"
                        value={user ? user.phone : ''}
                        onChangeText={text => this.setState({ phone: text })}
                        underlineColorAndroid="transparent"
                    />
                    <View>
                        <Text>Tổng hóa đơn: {total} đ</Text>
                    </View>
                    <TouchableOpacity style={bigButton}>
                        <Text style={buttonText}>SEND ORDER NOW</Text>
                    </TouchableOpacity>
                </View>
            </View>
        );
    }
}

const styles = StyleSheet.create({
    wrapper: {
        backgroundColor: '#3EBA77',
        height: '100%'
    },
    inputStyle: {
        height: 50,
        backgroundColor: '#fff',
        marginBottom: 10,
        borderRadius: 20,
        paddingLeft: 30
    },
    bigButton: {
        height: 50,
        borderRadius: 20,
        borderWidth: 1,
        borderColor: '#fff',
        alignItems: 'center',
        justifyContent: 'center'
    },
    buttonText: {
        fontFamily: 'Avenir',
        color: '#fff',
        fontWeight: '400'
    },
    backStyle: {
        width: 30,
        height: 30
    },
    header: {
        height: 50,
        flexDirection: 'row',
        justifyContent: 'space-between',
        alignItems: 'center',
        padding: 5
    },
});
