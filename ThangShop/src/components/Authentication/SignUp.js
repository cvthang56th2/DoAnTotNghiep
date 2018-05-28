import React, { Component } from 'react';
import { View, TextInput, Text, TouchableOpacity, StyleSheet, Alert } from 'react-native';
import register from '../../api/register';

export default class SignUp extends Component {
    constructor(props) {
        super(props);
        this.state = {
            name: '',
            email: '',
            password: '',
            rePassword: '',
            address: '',
            phone: ''
        };
    }

    onSuccess() {
        Alert.alert(
            'Notice',
            'Sign up successfully',
            [
                { text: 'OK', onPress: this.props.gotoSignIn() }
            ],
            { cancelable: false }
        );
    }

    onFail() {
        Alert.alert(
            'Notice',
            'Email has been used by other',
            [
                { text: 'OK', onPress: () => this.removeEmail.bind(this) }
            ],
            { cancelable: false }
        );
    }

    removeEmail() {
        this.setState({ email: '' });
    }

    registerUser() {
        const { name, email, password, address, phone } = this.state;
        register(email, name, password, address, phone)
            .then(res => {
                if (res === 'THANH_CONG') return this.onSuccess();
                this.onFail();
            });
    }

    render() {
        const { inputStyle, bigButton, buttonText, label, inputContainer } = styles;
        return (
            <View>
                <View style={inputContainer}>
                    <Text style={label}>Họ tên: </Text>
                    <TextInput
                        style={inputStyle}
                        placeholder="Nhập tên của bạn..."
                        value={this.state.name}
                        onChangeText={text => this.setState({ name: text })}
                        underlineColorAndroid="transparent"
                    />
                </View>
                <View style={inputContainer}>
                    <Text style={label}>Email: </Text>
                    <TextInput
                        style={inputStyle}
                        placeholder="Nhập địa chỉ email..."
                        value={this.state.email}
                        onChangeText={text => this.setState({ email: text })}
                        underlineColorAndroid="transparent"
                    />
                </View>
                <View style={inputContainer}>
                    <Text style={label}>Địa chỉ: </Text>
                    <TextInput
                        style={inputStyle}
                        placeholder="Nhập địa chỉ..."
                        value={this.state.address}
                        onChangeText={text => this.setState({ address: text })}
                        underlineColorAndroid="transparent"
                    />
                </View>

                <View style={inputContainer}>
                    <Text style={label}>Số điện thoại: </Text>
                    <TextInput
                        style={inputStyle}
                        placeholder="Nhập số điện thoại..."
                        value={this.state.phone}
                        onChangeText={text => this.setState({ phone: text })}
                        underlineColorAndroid="transparent"
                    />
                </View>

                <View style={inputContainer}>
                    <Text style={label}>Mật khẩu: </Text>
                    <TextInput
                        style={inputStyle}
                        placeholder="Nhập mật khẩu..."
                        value={this.state.password}
                        secureTextEntry
                        onChangeText={text => this.setState({ password: text })}
                        underlineColorAndroid="transparent"
                    />
                </View>
                <View style={inputContainer}>
                    <Text style={label}>Nhập lại mật khẩu: </Text>
                    <TextInput
                        style={inputStyle}
                        placeholder="Nhập lại mật khẩu"
                        value={this.state.rePassword}
                        secureTextEntry
                        onChangeText={text => this.setState({ rePassword: text })}
                        underlineColorAndroid="transparent"
                    />
                </View>
                <TouchableOpacity style={bigButton} onPress={this.registerUser.bind(this)}>
                    <Text style={buttonText}>ĐĂNG KÝ NGAY</Text>
                </TouchableOpacity>
            </View>
        );
    }
}

const styles = StyleSheet.create({
    inputStyle: {
        height: 50,
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
    },
    inputContainer: { display: 'flex', flexDirection: 'row', justifyContent: 'space-between' }
});
