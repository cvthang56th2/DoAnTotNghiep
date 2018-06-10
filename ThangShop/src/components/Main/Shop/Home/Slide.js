import React, { Component } from 'react';
import { View, Text, ImageBackground, StyleSheet, Dimensions, TouchableOpacity } from 'react-native';
import Swiper from 'react-native-swiper';

const { width } = Dimensions.get('window');
const url = 'http://10.130.50.43/DoAnTotNghiep/webproduct/upload/slide/';

export default class Slide extends Component {

    render() {
        const { slideList } = this.props;
        const { wrapper, textStyle, imageStyle, cateTitle } = styles;
        const swiper = (
            <Swiper showsPagination width={imageWidth} height={imageHeight} autoplay={true} autoplayTimeout={4.0} >
                {slideList.map(e => (
                    <ImageBackground source={{ uri: `${url}${e.image_link}` }} style={imageStyle}>
                    </ImageBackground>
                ))}
            </Swiper>
        );
        return (
            <View style={wrapper}>
                <View>
                    {slideList.length ? swiper : null}
                </View>
            </View>
        );
    }
}
//933 x 465
const imageWidth = '100%';
const imageHeight = 110;

const styles = StyleSheet.create({
    wrapper: {
        width: width,
        backgroundColor: '#FFF',
        justifyContent: 'space-between',
        shadowColor: '#2E272B',
        shadowOffset: { width: 0, height: 3 },
        shadowOpacity: 0.2,
        paddingTop: 0,
        borderWidth: 0.7,
        borderColor: '#fda',
    },
    textStyle: {
        fontSize: 20,
        color: '#AFAEAF'
    },
    imageStyle: {
        height: imageHeight,
        width: imageWidth,
        justifyContent: 'center',
        alignItems: 'center',
        resizeMode: 'center'
    },
    cateTitle: {
        fontSize: 20,
        fontFamily: 'Avenir',
        color: '#9A9A9A'
    }
});
