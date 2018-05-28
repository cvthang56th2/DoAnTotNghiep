import React, { Component } from 'react';
import {
    StyleSheet, Text, TouchableOpacity,
    ListView, View, Image, Dimensions
} from 'react-native';
import global from '../../../global';

const url = 'http://10.130.50.43/DoAnTotNghiep/webproduct/upload/product/';

function toTitleCase(str) {
    return str.replace(/\w\S*/g, txt => txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase());
}

class SearchView extends Component {
    constructor(props) {
        super(props);
        const ds = new ListView.DataSource({ rowHasChanged: (r1, r2) => r1 !== r2 });
        this.state = {
            listProduct: ds
        };
        global.setArraySearch = this.setSearchArray.bind(this);
    }

    setSearchArray(arrProduct) {
        this.setState({ listProduct: this.state.listProduct.cloneWithRows(arrProduct) });
    }

    addThisProductToCart(product) {
        global.addProductToCart(product);
    }

    gotoDetail(product) {
        const { navigator } = this.props;
        navigator.push({ name: 'PRODUCT_DETAIL', product });
    }
    render() {
        const {
            product, mainRight, txtMaterial, txtColor,
            txtName, txtPrice, productImage,
            txtShowDetail, showDetailContainer, wrapper, txtOldPrice
        } = styles;
        return (
            <View style={wrapper}>
                <ListView
                    enableEmptySections
                    dataSource={this.state.listProduct}
                    renderRow={productItem => (
                        <View style={product}>
                            <Image source={{ uri: `${url}${productItem.image_link}` }} style={productImage} />
                            <View style={mainRight}>
                                <TouchableOpacity onPress={() => this.gotoDetail(productItem)}>
                                    <Text style={txtName}>{toTitleCase(productItem.name)}</Text>
                                </TouchableOpacity>
                                {
                                    productItem.discount == 0 ?
                                        <Text style={txtPrice}>{productItem.price} đ</Text> : (
                                            <View style={{ display: 'flex', flexDirection: 'row', alignItems: 'center' }}>
                                                <Text style={txtPrice}>{productItem.price - productItem.discount} đ</Text>
                                                <Text> | </Text>
                                                <Text style={txtOldPrice}>{productItem.price} đ</Text>
                                            </View>
                                        )
                                }
                                <View style={{ display: 'flex', flexDirection: 'row', justifyContent:'space-around' }}>
                                    <TouchableOpacity onPress={() => this.gotoDetail(productItem)}>
                                        <Text style={txtShowDetail}>Xem chi tiết</Text>
                                    </TouchableOpacity>
                                    <TouchableOpacity onPress={() => this.addThisProductToCart(productItem)}>
                                        <Text style={txtShowDetail}>Thêm vào giỏ hàng</Text>
                                    </TouchableOpacity>
                                </View>
                            </View>
                        </View>
                    )}
                />
            </View>
        );
    }
}

const { width } = Dimensions.get('window');
const imageWidth = width / 4;
const imageHeight = (imageWidth * 452) / 361;

const styles = StyleSheet.create({
    wrapper: {
        backgroundColor: '#DFDFDF',
        flex: 1
    },
    product: {
        flexDirection: 'row',
        margin: 10,
        padding: 10,
        backgroundColor: '#FFFFFF',
        borderRadius: 2,
        shadowColor: '#3B5458',
        shadowOffset: { width: 0, height: 3 },
        shadowOpacity: 0.2,
        borderWidth: 0.7,
        borderColor: '#b7fc99',
        borderRadius: 4
    },
    productImage: {
        width: imageWidth,
        height: imageHeight,
        flex: 1,
        resizeMode: 'center'
    },
    mainRight: {
        flex: 3,
        justifyContent: 'space-between'
    },
    productController: {
        flexDirection: 'row'
    },
    numberOfProduct: {
        flex: 1,
        flexDirection: 'row',
        justifyContent: 'space-around'
    },
    txtName: {
        paddingLeft: 20,
        color: '#752ab7',
        fontSize: 15,
        fontWeight: '400',
        fontFamily: 'Avenir'
    },
    txtPrice: {
        paddingLeft: 20,
        color: '#C21C70',
        fontWeight: '400',
        fontFamily: 'Avenir'
    },
    txtOldPrice: {
        textDecorationLine: 'line-through',
        textDecorationStyle: 'solid'
    },
    txtColor: {
        paddingLeft: 20,
        color: 'black',
        fontSize: 15,
        fontWeight: '400',
        fontFamily: 'Avenir'
    },
    txtMaterial: {
        paddingLeft: 20,
        color: 'black',
        fontSize: 15,
        fontWeight: '400',
        fontFamily: 'Avenir'
    },
    txtShowDetail: {
        color: '#C21C70',
        fontSize: 10,
        fontWeight: '400',
        fontFamily: 'Avenir',
        textAlign: 'right',
        borderWidth: 1,
        borderColor: '#c21c70',
        borderRadius: 5,
        padding: 5,
        textAlign: 'center',
    },
    showDetailContainer: {
        flexDirection: 'row',
        position: 'absolute',
        alignSelf: 'flex-end',
        marginTop: 100
    }
});

export default SearchView;
