import React, { Component } from 'react';
import { View, TextInput, Text, TouchableOpacity, StyleSheet } from 'react-native';
export default class SignIn extends Component {
    constructor(props) {
        super(props);
        this.state = {
            name: '',
            email: '',
            address: '',
            phone: ''
        };
    }


    render() {
        const { inputStyle, bigButton, buttonText, wrapper } = styles;
        const { email, address, name, phone } = this.state;
        return (
            <View style={wrapper}>
                <View style={{ alignItems: 'center', marginBottom: 20 }}>
                    <Text style={{ color: '#fff', fontSize: 20}}>CHECK OUT</Text>
                </View>
                <TextInput
                    style={inputStyle}
                    placeholder="Enter your name"
                    value={name}
                    onChangeText={text => this.setState({ name: text })}
                    underlineColorAndroid="transparent"
                />
                <TextInput
                    style={inputStyle}
                    placeholder="Enter your email"
                    value={email}
                    onChangeText={text => this.setState({ email: text })}
                    underlineColorAndroid="transparent"
                />
                <TextInput
                    style={inputStyle}
                    placeholder="Enter your address"
                    value={address}
                    onChangeText={text => this.setState({ address: text })}
                    underlineColorAndroid="transparent"
                />
                <TextInput
                    style={inputStyle}
                    placeholder="Enter your phone number"
                    value={phone}
                    onChangeText={text => this.setState({ phone: text })}
                    secureTextEntry
                    underlineColorAndroid="transparent"
                />
                <TouchableOpacity style={bigButton}>
                    <Text style={buttonText}>SEND ORDER NOW</Text>
                </TouchableOpacity>
            </View>
        );
    }
}

const styles = StyleSheet.create({
    wrapper: {
        flex: 1,
        backgroundColor: '#3EBA77',
        padding: 20,
        justifyContent: 'center'
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
    }
});
