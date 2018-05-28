import React, { Component } from 'react';
import { 
    View, Text, TouchableOpacity, Image, Dimensions, TextInput, StyleSheet 
} from 'react-native';
import global from '../../global';
import icLogo from '../../../media/appIcon/YoloBlack.png';
import icMenu from '../../../media/appIcon/ic_menu.png';
import search from '../../../api/searchProduct';

const { height } = Dimensions.get('window');

export default class Header extends Component {
    constructor(props) {
        super(props);
        this.state = {
            txtSearch: ''
        };
    }

    onSearch() {
        const { txtSearch } = this.state;
        this.setState({ txtSearch: '' });
        search(txtSearch)
        .then(arrProduct => global.setArraySearch(arrProduct))
        .catch(err => console.log(err));
    }

    render() {
        const { wrapper, row1, textInput, iconStyle, titleStyle } = styles;
        return (
            <View style={wrapper}>
                <View style={row1}>
                    <TouchableOpacity onPress={this.props.onOpen} style={{borderWidth: 1, borderColor: "#fff", paddingRight: 2, paddingLeft: 2, borderRadius: 5}}>
                        <Image source={icMenu} style={iconStyle} />
                    </TouchableOpacity>
                    <Text style={titleStyle}>Yolo Shop</Text>
                    <Image source={icLogo} style={{width: 40, height: 40}} />
                </View>
                <TextInput 
                    style={textInput}
                    placeholder="Tìm kiếm sản phẩm..."
                    underlineColorAndroid="transparent"
                    value={this.state.txtSearch}
                    onChangeText={text => this.setState({ txtSearch: text })}
                    onFocus={() => global.gotoSearch()} 
                    onSubmitEditing={this.onSearch.bind(this)}
                />
            </View>
        );
    }
}

const styles = StyleSheet.create({
    wrapper: { 
        height: height / 8, 
        backgroundColor: '#34B089', 
        padding: 10, 
        justifyContent: 'space-around',
    },
    row1: { flexDirection: 'row', justifyContent: 'space-between', alignItems: 'center' },
    textInput: { 
        height: height / 23, 
        backgroundColor: '#FFF', 
        paddingLeft: 10,
        paddingVertical: 0,
        marginTop: 10
    },
    titleStyle: { color: '#FFF', fontFamily: 'Avenir', fontSize: 20 },
    iconStyle: { width: 25, height: 25 }
});
