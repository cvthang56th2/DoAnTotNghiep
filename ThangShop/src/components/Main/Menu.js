import React, { Component } from 'react';
import {
    View, Text,
    TouchableOpacity, StyleSheet, Image
} from 'react-native';
import global from '../global';
import profileIcon from '../../media/temp/profile.png';
import saveToken from '../../api/saveToken';
import icLogo from '../../media/appIcon/YoloBlack.png'

const url = 'http://10.130.50.43/DoAnTotNghiep/webproduct/upload/user/';

class Menu extends Component {
    constructor(props) {
        super(props);
        this.state = { user: null };
        global.onSignIn = this.onSignIn.bind(this);
    }
    onSignIn(user) {
        this.setState({ user });
        global.user = this.state.user;
    }

    onSignOut() {
        this.setState({ user: null });
        global.user = null;
        saveToken('');
    }

    gotoAuthentication() {
        const { navigator } = this.props;
        navigator.push({ name: 'AUTHENTICATION' });
    }
    gotoChangeInfo() {
        const { navigator } = this.props;
        navigator.push({ name: 'CHANGE_INFO', user: this.state.user });
    }
    gotoOrderHistory() {
        const { navigator } = this.props;
        navigator.push({ name: 'ORDER_HISTORY' });
    }
    render() {
        const {
            container, profile, btnStyle, btnText,
            btnSignInStyle, btnTextSignIn, loginContainer,
            username
        } = styles;
        const { user } = this.state;
        const logoutJSX = (
            <View style={{ flex: 1 }}>
                <TouchableOpacity style={btnStyle} onPress={this.gotoAuthentication.bind(this)}>
                    <Text style={btnText}>Đăng nhập</Text>
                </TouchableOpacity>
                <View style={{ display: 'flex', alignItems: 'center', marginTop: 30 }}>
                    <Image source={icLogo} style={{ width: 100, height: 100 }} />
                </View>
            </View>
        );
        const loginJSX = (
            <View style={loginContainer}>
                <Text style={username}>{user ? user.name : ''}</Text>
                <View>
                    <TouchableOpacity style={btnSignInStyle} onPress={this.gotoOrderHistory.bind(this)}>
                        <Text style={btnTextSignIn}>Lịch sử giao dich</Text>
                    </TouchableOpacity>
                    <TouchableOpacity style={btnSignInStyle} onPress={this.gotoChangeInfo.bind(this)}>
                        <Text style={btnTextSignIn}>Thay đổi thông tin</Text>
                    </TouchableOpacity>
                    <TouchableOpacity style={btnSignInStyle} onPress={this.onSignOut.bind(this)}>
                        <Text style={btnTextSignIn}>Thoát</Text>
                    </TouchableOpacity>
                </View>
                <View />
            </View>
        );
        const mainJSX = this.state.user ? loginJSX : logoutJSX;

        return (
            <View style={container}>
                {
                    user ? <Image source={{ uri: `${url}${user.image_link}` }} style={profile} /> : <Image source={profileIcon} style={profile} />
                }
                {mainJSX}
            </View>
        );
    }
}

const styles = StyleSheet.create({
    container: {
        flex: 1,
        backgroundColor: '#34B089',
        borderRightWidth: 3,
        borderColor: '#fff',
        alignItems: 'center'
    },
    profile: {
        width: 120,
        height: 120,
        borderRadius: 60,
        marginVertical: 30
    },
    btnStyle: {
        height: 50,
        backgroundColor: '#fff',
        justifyContent: 'center',
        alignItems: 'center',
        borderRadius: 5,
        paddingHorizontal: 50
    },
    btnText: {
        color: '#34B089',
        fontFamily: 'Avenir',
    },
    btnSignInStyle: {
        height: 50,
        backgroundColor: '#fff',
        borderRadius: 5,
        width: 200,
        marginBottom: 10,
        justifyContent: 'center',
        paddingLeft: 10
    },
    btnTextSignIn: {
        color: '#34B089',
        fontSize: 15
    },
    loginContainer: {
        flex: 1,
        justifyContent: 'space-between',
        alignItems: 'center'
    },
    username: {
        color: '#fff',
        fontFamily: 'Avenir',
        fontSize: 15
    }
});

export default Menu;
