import React, { Component } from 'react';
import {
    View, Text, StyleSheet, Image, Dimensions, ScrollView, TouchableOpacity
} from 'react-native';
import HTML from 'react-native-render-html';

import global from '../../../global';

const back = require('../../../../media/appIcon/back.png');
const cart = require('../../../../media/appIcon/cartfull.png');

const url = 'http://10.130.50.43/DoAnTotNghiep/webproduct/upload/product/';

export default class ProductDetail extends Component {
    goBack() {
        const { navigator } = this.props;
        navigator.pop();
    }
    addThisProductToCart() {
        const { product } = this.props;
        global.addProductToCart(product);
    }
    render() {
        const {
            wrapper, cardStyle, header,
            footer, backStyle,
            imageContainer, cartStyle, textBlack,
            textSmoke, textHighlight, textMain, titleContainer,
            descContainer, productImageStyle, descStyle, txtMaterial, txtColor,
            addToCartBtn, backBtn
        } = styles;
        const { name, price, content, image_link, image_list } = this.props.product;
        var imageList;
        if (image_list == "")
            imageList = [];
        else imageList = JSON.parse(image_list);
        const imageListJSX = (
            imageList.map(e => (
                <Image source={{ uri: `${url}${e}` }} style={productImageStyle} />
            ))
        );
        return (
            <ScrollView style={wrapper}>
                <View style={cardStyle}>
                    <View style={header}>
                        <TouchableOpacity onPress={this.goBack.bind(this)} style={backBtn}>
                            <Image style={backStyle} source={back} />
                        </TouchableOpacity>
                        <TouchableOpacity onPress={this.addThisProductToCart.bind(this)} style={addToCartBtn}>
                            <Text style={{ fontSize: 14, color: '#34B089' }}>Thêm vào giỏ hàng</Text>
                            <Image style={cartStyle} source={cart} />
                        </TouchableOpacity>
                    </View>
                    <View style={imageContainer}>
                        <ScrollView style={{ flexDirection: 'row', padding: 10 }} horizontal >
                            <Image source={{ uri: `${url}${image_link}` }} style={productImageStyle} />
                            {
                                imageList ? imageListJSX : null
                            }
                        </ScrollView>
                    </View>
                    <View style={footer}>
                        <View style={titleContainer}>
                            <Text style={textMain}>
                                <Text style={textBlack}>{name.toUpperCase()}</Text>
                                <Text style={textHighlight}> / </Text>
                                <Text style={textSmoke}>{price} đ</Text>
                            </Text>
                        </View>
                        <View style={descContainer}>
                            <HTML html={content ? content : "Chưa có bài viết"} style={descStyle}></HTML>

                        </View>
                    </View>
                </View>
            </ScrollView>
        );
    }
}

const { width } = Dimensions.get('window');
const swiperWidth = (width / 2);
const swiperHeight = (swiperWidth * 452) / 361;

const styles = StyleSheet.create({
    wrapper: {
        flex: 1,
        backgroundColor: '#D6D6D6',
    },
    cardStyle: {
        flex: 1,
        backgroundColor: '#FFFFFF',
        borderRadius: 5,
        marginHorizontal: 10,
        marginVertical: 10
    },
    header: {
        flexDirection: 'row',
        justifyContent: 'space-between',
        flex: 1,
        paddingHorizontal: 15,
        paddingTop: 20
    },
    cartStyle: {
        width: 25,
        height: 25
    },
    backStyle: {
        width: 25,
        height: 25
    },

    footer: {
        flex: 6
    },
    imageContainer: {
        flex: 6,
        alignItems: 'center',
        flexDirection: 'row',
    },
    textMain: {
        paddingLeft: 20,
        marginVertical: 10,
        borderBottomWidth: 1,
        borderBottomColor: '#ccc'
    },
    textBlack: {
        fontFamily: 'Avenir',
        fontSize: 20,
        fontWeight: 'bold',
        color: '#3F3F46'
    },
    textSmoke: {
        fontFamily: 'Avenir',
        fontSize: 20,
        color: '#9A9A9A'
    },
    textHighlight: {
        fontFamily: 'Avenir',
        fontSize: 20,
        color: '#7D59C8'
    },
    titleContainer: {
        borderBottomWidth: 1,
        borderColor: '#F6F6F6',
        marginHorizontal: 20,
        paddingBottom: 5
    },
    descContainer: {
        margin: 10,
        paddingTop: 10,
        paddingHorizontal: 10
    },
    descStyle: {
        color: '#AFAFAF'
    },
    linkStyle: {
        color: '#7D59C8'
    },
    productImageStyle: {
        width: swiperWidth,
        height: swiperHeight,
        marginHorizontal: 5,
        resizeMode: 'center'
    },
    mainRight: {
        justifyContent: 'space-between',
        alignSelf: 'stretch',
        paddingLeft: 20
    },
    txtColor: {
        color: '#C21C70',
        fontSize: 15,
        fontWeight: '400',
        fontFamily: 'Avenir'
    },
    txtMaterial: {
        color: '#C21C70',
        fontSize: 15,
        fontWeight: '400',
        fontFamily: 'Avenir'
    },
    addToCartBtn: { flexDirection: 'row', alignItems: 'center', borderWidth: 2, borderColor: '#34B089', borderRadius: 10, padding: 5 },
    backBtn: { borderWidth: 2, borderColor: '#34B089', borderRadius: 10, padding: 2, alignItems:'center', display:'flex' }
});
