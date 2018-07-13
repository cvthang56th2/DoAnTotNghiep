import React, { Component } from 'react';
// import { View, Text, TouchableOpacity } from 'react-native';

import Shop from './Shop/Shop';

export default class Main extends Component {
    render() {
        const { navigator } = this.props;
        return (
            <Shop />
        );
    }
}
