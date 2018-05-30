import React, { Component } from 'react';
import {
    View, TouchableOpacity,
    Text, StyleSheet, ListView,
    Image, RefreshControl,
    Dimensions
} from 'react-native';
import global from "../../../global";
import getListProduct from '../../../../api/getListProduct';

import backList from '../../../../media/appIcon/backList.png';

const url = 'http://127.0.0.1/DoAnTotNghiep/webproduct/upload/product/';
function toTitleCase(str) {
    return str.replace(/\w\S*/g, txt => txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase());
}

export default class ListProduct extends Component {
    constructor(props) {
        super(props);
        const ds = new ListView.DataSource({ rowHasChanged: (r1, r2) => r1 !== r2 });
        this.state = {
            listProducts: ds,
            refreshing: false,
            page: 0
        };
        this.arr = [];
    }

    addThisProductToCart(product) {
        global.addProductToCart(product);
    }

    componentDidMount() {
        const idType = this.props.category.id;
        getListProduct(idType, 0)
            .then(arrProduct => {
                this.arr = arrProduct;
                this.setState({ listProducts: this.state.listProducts.cloneWithRows(this.arr) });
            })
            .catch(err => console.log(err));
    }

    goBack() {
        const { navigator } = this.props;
        navigator.pop();
    }

    gotoDetail(product) {
        const { navigator } = this.props;
        navigator.push({ name: 'PRODUCT_DETAIL', product });
    }

    render() {
        const {
            container, header, wrapper, backStyle, titleStyle,
            productContainer, productImage, productInfo, lastRowInfo,
            txtName, txtPrice, txtMaterial, txtColor, txtShowDetail, txtOldPrice,
            showDetailContainer
        } = styles;
        const { category } = this.props;
        return (
            <View style={container}>
                <View style={wrapper}>
                    <View style={header}>
                        <TouchableOpacity onPress={this.goBack.bind(this)}>
                            <Image source={backList} style={backStyle} />
                        </TouchableOpacity>
                        <Text style={titleStyle}>{category.name}</Text>
                        <View style={{ width: 30 }} />
                    </View>
                    <ListView
                        removeClippedSubviews={false}
                        dataSource={this.state.listProducts}
                        renderRow={product => (
                            <View style={productContainer}>
                                <Image style={productImage} source={{ uri: `${url}${product.image_link}` }} />
                                <View style={productInfo}>
                                    <TouchableOpacity onPress={() => this.gotoDetail(product)}>
                                        <Text style={txtName}>{toTitleCase(product.name)}</Text>
                                    </TouchableOpacity>
                                    {
                                        product.discount == 0 ?
                                            <Text style={txtPrice}>{
                                                parseFloat(product.price).toFixed(0).replace(/./g, function (c, i, a) {
                                                    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
                                                })
                                            } đ</Text> : (
                                                <View style={{ display: 'flex', alignItems: 'center' }}>
                                                    <Text style={txtPrice}>{

                                                        parseFloat(product.price - product.discount).toFixed(0).replace(/./g, function (c, i, a) {
                                                            return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
                                                        })
                                                    } đ</Text>
                                                    <Text style={txtOldPrice}>{
                                                        parseFloat(product.price).toFixed(0).replace(/./g, function (c, i, a) {
                                                            return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
                                                        })
                                                    } đ</Text>
                                                </View>
                                            )
                                    }
                                    <TouchableOpacity onPress={() => this.gotoDetail(product)}>
                                        <Text style={txtShowDetail}>Xem chi tiết</Text>
                                    </TouchableOpacity>
                                    <TouchableOpacity onPress={() => this.addThisProductToCart(product)}>
                                        <Text style={txtShowDetail}>Thêm vào giỏ hàng</Text>
                                    </TouchableOpacity>
                                </View>
                            </View>
                        )}
                        refreshControl={
                            <RefreshControl
                                refreshing={this.state.refreshing}
                                onRefresh={() => {
                                    this.setState({ refreshing: true });
                                    const newPage = this.state.page + 1;
                                    const idType = this.props.category.id;
                                    getListProduct(idType, newPage)
                                        .then(arrProduct => {
                                            this.arr = arrProduct.concat(this.arr);
                                            this.setState({
                                                page: newPage,
                                                listProducts: this.state.listProducts.cloneWithRows(this.arr),
                                                refreshing: false
                                            });
                                        })
                                        .catch(err => console.log(err));
                                }}
                            />
                        }
                    />
                </View>
            </View>
        );
    }
}
const { width } = Dimensions.get('window');
const imageWidth = width / 4;
const imageHeight = (imageWidth * 452) / 361;


const styles = StyleSheet.create({
    container: {
        flex: 1,
        backgroundColor: '#DBDBD8',
    },
    header: {
        height: 50,
        flexDirection: 'row',
        justifyContent: 'space-between',
        alignItems: 'center',
        padding: 5
    },
    wrapper: {
        backgroundColor: '#fff',
        shadowColor: '#2E272B',
        shadowOffset: { width: 0, height: 3 },
        shadowOpacity: 0.2,
        margin: 10,
        paddingHorizontal: 10,
        height: '100%',
        paddingBottom: 10
    },
    backStyle: {
        width: 30,
        height: 30
    },
    productContainer: {
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
    titleStyle: {
        fontFamily: 'Avenir',
        color: '#B10D65',
        fontSize: 20
    },
    productImage: {
        width: imageWidth,
        height: imageHeight,
        flex: 1,
        resizeMode: 'center'
    },
    productInfo: {
        justifyContent: 'space-between',
        marginLeft: 15,
        flex: 1
    },
    lastRowInfo: {
        flexDirection: 'row',
        justifyContent: 'space-between',
        alignItems: 'center'
    },
    txtName: {
        fontFamily: 'Avenir',
        fontWeight: '400',
        color: '#752ab7',
        fontSize: 15
    },
    txtPrice: {
        marginTop: 5,
        fontFamily: 'Avenir',
        color: '#B10D65',
    },
    txtOldPrice: {
        textDecorationLine: 'line-through',
        textDecorationStyle: 'solid'
    },
    txtMaterial: {
        fontFamily: 'Avenir'
    },
    txtColor: {
        fontFamily: 'Avenir'
    },
    txtShowDetail: {
        marginTop: 5,
        fontFamily: 'Avenir',
        color: '#B10D65',
        fontSize: 11,
        borderWidth: 1,
        borderColor: '#c21c70',
        borderRadius: 5,
        padding: 5,
        textAlign: 'center',
    },
});
