import React, { Component } from 'react';
import { View, Text, ImageBackground, StyleSheet, Dimensions, TouchableOpacity } from 'react-native';
import Swiper from 'react-native-swiper';
import global from '../../../global';

const { width } = Dimensions.get('window');
const url = 'http://192.168.26.116/DoAnTotNghiep/webproduct/upload/slide/';

export default class Category extends Component {
    gotoListProduct(category) {
        const { navigator } = this.props;
        navigator.push({ name: 'LIST_PRODUCT', category });
    }
    render() {
        const { types } = this.props;
        const { wrapper, textStyle, imageStyle, cateTitle } = styles;
        const swiper = (
            <Swiper showsPagination width={imageWidth} height={imageHeight} autoplay={true} autoplayTimeout={2.5}>
                {types.map(e => (
                    <TouchableOpacity onPress={() => this.gotoListProduct(e)} key={e.id}>
                        <ImageBackground source={{ uri: `${url}${e.image}` }} style={imageStyle}>
                            <Text style={cateTitle}>{e.name}</Text>
                        </ImageBackground>
                    </TouchableOpacity>
                ))}
            </Swiper>
        );
        return (
            <View style={wrapper}>
                <TouchableOpacity onPress={() => global.gotoCatalog()} >
                    <View style={{ justifyContent: 'center', height: 50 }}>
                        <Text style={textStyle} >Danh mục sản phẩm</Text>
                    </View>
                </TouchableOpacity>
                <View style={{ justifyContent: 'flex-end', flex: 4 }}>
                    {types.length ? swiper : null}
                </View>
            </View>
        );
    }
}
//933 x 465
const imageWidth = width - 40;
const imageHeight = imageWidth / 2;

const styles = StyleSheet.create({
    wrapper: {
        width: width - 20,
        backgroundColor: '#FFF',
        margin: 10,
        justifyContent: 'space-between',
        shadowColor: '#2E272B',
        shadowOffset: { width: 0, height: 3 },
        shadowOpacity: 0.2,
        padding: 10,
        paddingTop: 0,
        borderWidth: 0.7,
        borderColor: '#fda',
        borderRadius: 4
    },
    textStyle: {
        fontSize: 20,
        color: '#AFAEAF'
    },
    imageStyle: {
        height: imageHeight,
        width: imageWidth,
        justifyContent: 'center',
        alignItems: 'center'
    },
    cateTitle: {
        fontSize: 25,
        fontFamily: 'Avenir',
        color: '#f44141',
        fontWeight: 'bold',
        textShadowColor: '#262422',
        textShadowOffset: { width: 5, height: 5 }
    }
});
