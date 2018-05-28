import React, { Component } from 'react';
import { View, TextInput, Text, TouchableOpacity, StyleSheet, Alert, Image } from 'react-native';
import signIn from '../../api/signIn';
import global from '../global';
import login from '../../media/temp/login.png';

import saveToken from '../../api/saveToken';

export default class SignIn extends Component {
    constructor(props) {
        super(props);
        this.state = {
            email: '',
            password: ''
        };
    }

    onSignIn() {
        const { email, password } = this.state;
        signIn(email, password)
            .then(res => {
                global.onSignIn(res.user);
                this.props.goBackToMain();
                saveToken(res.token);
            })
            .catch(err => {
                Alert.alert(
                    'Đăng nhập lỗi!',
                    'Vui lòng kiểm tra lại thông tin đăng nhập',
                    [
                        { text: 'OK' }
                    ],
                    { cancelable: false }
                );
            });
    }

    render() {
        const { inputStyle, bigButton, buttonText, label, inputContainer } = styles;
        const { email, password } = this.state;
        return (
            <View style={{ display: 'flex', justifyContent: 'space-around', height: '60%' }}>
                <View style={{ display: 'flex', alignItems: 'center', marginBottom: 20 }}>
                    <Image source={login} style={{ width: 100, height: 100 }} />
                </View>
                <View style={inputContainer}>
                    <Text style={label}>Email: </Text>
                    <TextInput
                        style={inputStyle}
                        placeholder="Nhập email của bạn..."
                        value={email}
                        onChangeText={text => this.setState({ email: text })}
                        underlineColorAndroid="transparent"
                    />
                </View>
                <View style={inputContainer}>
                    <Text style={label}>Mật khẩu: </Text>
                    <TextInput
                        style={inputStyle}
                        placeholder="Nhập mật khẩu ..."
                        value={password}
                        onChangeText={text => this.setState({ password: text })}
                        secureTextEntry
                        underlineColorAndroid="transparent"
                    />
                </View>
                <TouchableOpacity style={bigButton} onPress={this.onSignIn.bind(this)}>
                    <Text style={buttonText}>ĐĂNG NHẬP NGAY</Text>
                </TouchableOpacity>
            </View>
        );
    }
}

const styles = StyleSheet.create({
    inputStyle: {
        height: 40,
        backgroundColor: '#fff',
        marginBottom: 10,
        borderRadius: 20,
        paddingLeft: 30,
        width: '80%'
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
    label: {
        color: '#fff',
        width: '20%'
    },
    inputContainer: { display: 'flex', flexDirection: 'row', justifyContent: 'space-between' }
});
