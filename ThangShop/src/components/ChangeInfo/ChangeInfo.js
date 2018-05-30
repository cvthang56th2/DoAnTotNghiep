import React, { Component } from 'react';
import {
    View, TouchableOpacity, Text, Image, StyleSheet, TextInput, Alert
} from 'react-native';
import backSpecial from '../../media/appIcon/backs.png';
import getToken from '../../api/getToken';
import changeInfoAPI from '../../api/changeInfo'
import global from '../global';

export default class ChangeInfo extends Component {
    constructor(props) {
        super(props);
        const { name, address, phone } = props.user;
        this.state = {
            txtName: name,
            txtAddress: address,
            txtPhone: phone,
            txtPassword: '',
            txtRePassword: ''
        };
    }
    goBackToMain() {
        const { navigator } = this.props;
        navigator.pop();
    }

    alertSuccess() {
        Alert.alert(
            'Thông báo',
            'Cập nhật thông tin thành công!',
            [
                { text: 'OK', onPress: this.goBackToMain.bind(this) }
            ],
            { cancelable: false }
        );
    }

    change() {
        const { txtName, txtAddress, txtPhone, txtPassword } = this.state;
        getToken()
            .then(token => changeInfoAPI(token, txtName, txtPhone, txtAddress, txtPassword))
            .then(user => {
                this.alertSuccess()
                global.onSignIn(user)
            })
            .catch(err => console.log(err));
    }

    render() {
        const {
            wrapper, header, headerTitle, backIconStyle, body,
            signInContainer, signInTextStyle, textInput,
            label, inputContainer
        } = styles;
        const { txtName, txtAddress, txtPhone } = this.state;
        return (
            <View style={wrapper}>
                <View style={header}>
                    <View />
                    <Text style={headerTitle}>Thông tin người dùng</Text>
                    <TouchableOpacity onPress={this.goBackToMain.bind(this)}>
                        <Image source={backSpecial} style={backIconStyle} />
                    </TouchableOpacity>
                </View>
                <View style={body}>
                    <View style={inputContainer}>
                        <Text style={label}>Họ tên: </Text>
                        <TextInput
                            style={textInput}
                            placeholder="Nhập họ tên..."
                            autoCapitalize="none"
                            value={txtName}
                            onChangeText={text => this.setState({ ...this.state, txtName: text })}
                            underlineColorAndroid="transparent"
                        />
                    </View>

                    <View style={inputContainer}>
                        <Text style={label}>Địa chỉ: </Text>
                        <TextInput
                            style={textInput}
                            placeholder="Nhập địa chỉ..."
                            autoCapitalize="none"
                            value={txtAddress}
                            onChangeText={text => this.setState({ ...this.state, txtAddress: text })}
                            underlineColorAndroid="transparent"
                        />
                    </View>

                    <View style={inputContainer}>
                        <Text style={label}>Số điện thoại: </Text>
                        <TextInput
                            style={textInput}
                            placeholder="Nhập số điện thoại..."
                            autoCapitalize="none"
                            value={txtPhone}
                            onChangeText={text => this.setState({ ...this.state, txtPhone: text })}
                            underlineColorAndroid="transparent"
                        />
                    </View>

                    <View style={inputContainer}>
                        <Text style={label}>Mật khẩu: </Text>
                        <TextInput
                            style={textInput}
                            placeholder="Điền mật nếu muốn thay đổi"
                            autoCapitalize="none"
                            onChangeText={text => this.setState({ ...this.state, txtPassword: text })}
                            underlineColorAndroid="transparent"
                        />
                    </View>

                    <View style={inputContainer}>
                        <Text style={label}>Nhập lại mật khẩu: </Text>
                        <TextInput
                            style={textInput}
                            placeholder="Điền lại mật khẩu"
                            autoCapitalize="none"
                            onChangeText={text => this.setState({ ...this.state, txtRePassword: text })}
                            underlineColorAndroid="transparent"
                        />
                    </View>

                    <TouchableOpacity style={signInContainer} onPress={this.change.bind(this)}>
                        <Text style={signInTextStyle}>CẬP NHẬT THÔNG TIN</Text>
                    </TouchableOpacity>
                </View>
            </View>
        );
    }
}

const styles = StyleSheet.create({
    wrapper: { flex: 1, backgroundColor: '#fff' },
    header: { flex: 1, backgroundColor: '#2ABB9C', alignItems: 'center', justifyContent: 'space-between', flexDirection: 'row', paddingHorizontal: 10 },// eslint-disable-line
    headerTitle: { fontFamily: 'Avenir', color: '#fff', fontSize: 20 },
    backIconStyle: { width: 30, height: 30 },
    body: { flex: 10, backgroundColor: '#F6F6F6', justifyContent: 'center', paddingRight: 40, paddingLeft: 20 },
    textInput: {
        height: 45,
        marginHorizontal: 20,
        backgroundColor: '#FFFFFF',
        fontFamily: 'Avenir',
        paddingLeft: 20,
        borderRadius: 20,
        marginBottom: 20,
        borderColor: '#2ABB9C',
        borderWidth: 1,
        width: '80%'
    },
    signInTextStyle: {
        color: '#FFF', fontFamily: 'Avenir', fontWeight: '600', paddingHorizontal: 20
    },
    signInContainer: {
        marginHorizontal: 20,
        backgroundColor: '#2ABB9C',
        borderRadius: 20,
        height: 45,
        alignItems: 'center',
        justifyContent: 'center',
        alignSelf: 'stretch'
    },
    signInStyle: {
        flex: 3,
        marginTop: 50
    },
    label: {
        width: '20%'
    },
    inputContainer: { display: 'flex', flexDirection: 'row', justifyContent: 'space-between' }
});
