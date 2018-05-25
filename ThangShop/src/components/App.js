import React, { Component } from 'react';
import { StatusBar } from 'react-native';
import {Navigator} from 'react-native-deprecated-custom-components';

import Authentication from './Authentication/Authentication';
import ChangeInfo from './ChangeInfo/ChangeInfo';
import Main from './Main/Main';
import OrderHistory from './OrderHistory/OrderHistory';
import refreshToken from '../api/refreshToken';
// RN >= 0.52
import {YellowBox} from 'react-native';
YellowBox.ignoreWarnings(['Warning: ReactNative.createElement']);

// RN < 0.52
console.disableYellowBox = true;

StatusBar.setHidden(true);

export default class App extends Component {
    componentDidMount() {
        setInterval(refreshToken, 30000);
    }
    render() {
        return (
            <Navigator 
                initialRoute={{ name: 'MAIN' }}
                renderScene={(route, navigator) => {
                    switch (route.name) {
                        case 'MAIN': return <Main navigator={navigator} />;
                        case 'CHANGE_INFO': return <ChangeInfo navigator={navigator} user={route.user} />;
                        case 'AUTHENTICATION': return <Authentication navigator={navigator} />;
                        default: return <OrderHistory navigator={navigator} />;
                    }
                }}
                configureScene={route => {
                    if (route.name === 'AUTHENTICATION') return Navigator.SceneConfigs.FloatFromRight;
                    return Navigator.SceneConfigs.FloatFromLeft;
                }}
            />
        );
    }
}
