import React, { Component } from 'react';
import { StatusBar } from 'react-native';
import {Navigator} from 'react-native-deprecated-custom-components';

import Main from './Main/Main';
// RN >= 0.52
import {YellowBox} from 'react-native';
YellowBox.ignoreWarnings(['Warning: ReactNative.createElement']);

// RN < 0.52
console.disableYellowBox = true;

StatusBar.setHidden(true);

export default class App extends Component {
    render() {
        return (
            <Navigator 
                initialRoute={{ name: 'MAIN' }}
                renderScene={(route, navigator) => {
                    switch (route.name) {
                        case 'MAIN': return <Main navigator={navigator} />;
                    }
                }}
            />
        );
    }
}
