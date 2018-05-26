import React, { Component } from 'react';
import { View, TextInput, Text, TouchableOpacity, StyleSheet, Image, Alert } from 'react-native';
import back_white from '../../../../media/appIcon/back_white.png';
import global from '../../../global';
import getToken from '../../../../api/getToken';
import checkLogin from '../../../../api/checkLogin';
import sendOrder from '../../../../api/sendOrder';

export default class SignIn extends Component {
    constructor(props) {
        super(props);
        this.state = {
            name: global.user.name,
            email: global.user.email,
            address: global.user.address,
            phone: global.user.phone,
        };
    }

    removeAllProduct() {
        global.removeAllProduct();
    }

    async onSendOrder() {
        try {
            const token = getToken();
            const { name, email, address, phone } = this.state;
            const arrayDetail = this.props.cartArray;
            const kq = await sendOrder(token, arrayDetail, name, email, address, phone);
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
                global.gotoHome();
            } else {
                Alert.alert(
                    'Thất bại!',
                    'Có lỗi khi gửi đơn hàng',
                    [
                        { text: 'OK' }
                    ],
                    { cancelable: false }
                );
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
        const { inputStyle, bigButton, buttonText,
            wrapper, header, backStyle, wrapInput
        } = styles;
        const { email, address, name, phone } = this.state;
        const { user } = global;
        const { cartArray } = this.props;
        var total = 0;
        cartArray.map(e => {
            if (e.product.discount == 0)
                total += (e.product.price * e.quantity);
            else
                total += ((e.product.price - e.product.discount) * e.quantity);
        });
        return (
            <View style={wrapper}>
                <TouchableOpacity onPress={this.goBack.bind(this)}>
                    <View style={{
                        flexDirection: 'row', justifyContent: 'space-between', backgroundColor: '#2ABB9C', padding: 10
                    }}>
                        <Image source={back_white} style={backStyle} />
                        <Text style={{ color: '#fff', fontSize: 20 }}>Quay lại giỏ hàng</Text>
                        <View></View>
                    </View>

                </TouchableOpacity>
                <View style={{ backgroundColor: '#fff', display: 'flex', justifyContent: 'space-around', height: '95%' }}>
                    <View style={{ alignItems: 'center', marginBottom: 20 }}>
                        <Text style={{ fontSize: 20 }}>Thanh toán</Text>
                    </View>
                    <View style={wrapInput}>
                        <Text>Tên (*): </Text>
                        <TextInput
                            style={inputStyle}
                            placeholder="Enter your name"
                            defaultValue={user ? user.name : ''}
                            onChangeText={text => this.setState({ name: text })}
                            underlineColorAndroid="transparent"
                        />
                    </View>

                    <View style={wrapInput}>
                        <Text>Email: (*): </Text>
                        <TextInput
                            style={inputStyle}
                            placeholder="Enter your email"
                            defaultValue={user ? user.email : ''}
                            onChangeText={text => this.setState({ email: text })}
                            underlineColorAndroid="transparent"
                        />
                    </View>

                    <View style={wrapInput}>
                        <Text>Địa chỉ (*): </Text>
                        <TextInput
                            style={inputStyle}
                            placeholder="Enter your address"
                            defaultValue={user ? user.address : ''}
                            onChangeText={text => this.setState({ address: text })}
                            underlineColorAndroid="transparent"
                        />
                    </View>

                    <View style={wrapInput}>
                        <Text>Số điện thoại (*): </Text>
                        <TextInput
                            style={inputStyle}
                            placeholder="Enter your phone number"
                            defaultValue={user ? user.phone : ''}
                            onChangeText={text => this.setState({ phone: text })}
                            underlineColorAndroid="transparent"
                        />
                    </View>

                    <View>
                        <Text>Tổng hóa đơn: {total} đ</Text>
                    </View>
                    <TouchableOpacity style={bigButton} onPress={() => {
                        Alert.alert(
                            'Notice',
                            'Are you sure?',
                            [
                                { text: 'YES', onPress: () => this.onSendOrder() },
                                { text: 'NO' }
                            ],
                            { cancelable: false }
                        );
                    }}>
                        <Text style={buttonText} >
                            SEND ORDER NOW</Text>
                    </TouchableOpacity>
                </View >
            </View >
        );
    }
}

const styles = StyleSheet.create({
    wrapper: {
        backgroundColor: '#fff',
        height: '100%'
    },
    inputStyle: {
        height: 50,
        backgroundColor: '#fff',
        marginBottom: 10,
        borderRadius: 20,
        paddingLeft: 20,
        width: "70%",
        borderWidth: 1,
        borderColor: '#ccc'
    },
    bigButton: {
        height: 50,
        margin: 10,
        marginTop: 0,
        backgroundColor: '#2ABB9C',
        borderRadius: 2,
        alignItems: 'center',
        justifyContent: 'center'
    },
    buttonText: {
        color: '#FFF',
        fontSize: 15,
        fontWeight: 'bold',
        fontFamily: 'Avenir'
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
    wrapInput: {
        display: 'flex',
        flexDirection: 'row',
        justifyContent: 'space-between',
        alignItems: 'center',
        padding: 10
    }
});
