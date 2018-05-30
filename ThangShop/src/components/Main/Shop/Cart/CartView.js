import React, { Component } from 'react';
import {
    View, Text, TouchableOpacity, ListView,
    Dimensions, StyleSheet, Image, Alert
} from 'react-native';
import global from '../../../global';
import sendOrder from '../../../../api/sendOrder';
import getToken from '../../../../api/getToken';

function toTitleCase(str) {
    return str.replace(/\w\S*/g, txt => txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase());
}

const url = 'http://127.0.0.1/DoAnTotNghiep/webproduct/upload/product/';

class CartView extends Component {
    incrQuantity(id) {
        global.incrQuantity(id);
    }
    decrQuantity(id) {
        global.decrQuantity(id);
    }
    removeProduct(id) {
        global.removeProduct(id);
    }
    removeAllProduct() {
        global.removeAllProduct();
    }
    gotoDetail(product) {
        const { navigator } = this.props;
        navigator.push({ name: 'PRODUCT_DETAIL', product });
    }
    gotoCheckOut() {
        const { navigator } = this.props;
        navigator.push({ name: 'CHECK_OUT' });
    }

    onCheckOut() {
        this.gotoCheckOut();
    }

    render() {
        const { main, checkoutButton, checkoutTitle, wrapper,
            productStyle, mainRight, productController,
            txtName, txtPrice, productImage, numberOfProduct,
            txtShowDetail, showDetailContainer, txtOldPrice } = styles;
        const { cartArray } = this.props;
        var total = 0;
        cartArray.map(e => {
            if (e.product.discount == 0)
                total += (e.product.price * e.quantity);
            else
                total += ((e.product.price - e.product.discount) * e.quantity);
        });
        return (
            <View style={wrapper}>
                <ListView
                    contentContainerStyle={main}
                    enableEmptySections
                    dataSource={new ListView.DataSource({ rowHasChanged: (r1, r2) => r1 !== r2 }).cloneWithRows(cartArray)}
                    renderRow={cartItem => (
                        <View style={productStyle}>
                            <Image source={{ uri: `${url}${cartItem.product.image_link}` }} style={productImage} />
                            <View style={[mainRight]}>
                                <View style={{ justifyContent: 'space-between', flexDirection: 'row' }}>
                                    <TouchableOpacity style={showDetailContainer} onPress={() => this.gotoDetail(cartItem.product)}>
                                        <Text style={txtName}>{toTitleCase(cartItem.product.name)}</Text>
                                    </TouchableOpacity>
                                    <TouchableOpacity onPress={() => this.removeProduct(cartItem.product.id)}>
                                        <Text style={{ fontFamily: 'Avenir', color: '#969696', borderWidth: 1, borderColor: '#969696', borderRadius: 10, paddingRight: 1, paddingLeft: 4 }}>X</Text>
                                    </TouchableOpacity>
                                </View>
                                <View>
                                    {
                                        cartItem.product.discount == 0 ? <Text style={txtPrice}>{cartItem.product.price} đ</Text> : (
                                            <View style={{display: 'flex', flexDirection: 'row', alignItems: 'center'}}>
                                                <Text style={txtPrice}>{cartItem.product.price - cartItem.product.discount} đ</Text>
                                                <Text> | </Text>
                                                <Text style={txtOldPrice}>{cartItem.product.price} đ</Text>
                                            </View>
                                        )
                                    }
                                </View>
                                <View style={productController}>
                                    <View style={numberOfProduct}>
                                        <TouchableOpacity onPress={() => this.incrQuantity(cartItem.product.id)}>
                                            <Text>+</Text>
                                        </TouchableOpacity>
                                        <Text>{cartItem.quantity}</Text>
                                        <TouchableOpacity onPress={() => this.decrQuantity(cartItem.product.id)}>
                                            <Text>-</Text>
                                        </TouchableOpacity>
                                    </View>
                                    <TouchableOpacity style={showDetailContainer} onPress={() => this.gotoDetail(cartItem.product)}>
                                        <Text style={txtShowDetail}>Xem chi tiết</Text>
                                    </TouchableOpacity>
                                </View>
                            </View>
                        </View>
                    )}
                />
                <TouchableOpacity style={checkoutButton} onPress={() => {
                    if (total === 0) {
                        Alert.alert(
                            'Notice',
                            'Send order Failed: No product',
                            [
                                { text: 'OK' }
                            ],
                            { cancelable: false }
                        );
                    } else
                        this.onCheckOut();
                }
                }>
                    <Text style={checkoutTitle}>TỔNG: {total} đ - THANH TOÁN NGAY</Text>
                </TouchableOpacity>
            </View>
        );
    }
}

const { width } = Dimensions.get('window');
const imageWidth = width / 4;
const imageHeight = (imageWidth * 452) / 361;

const styles = StyleSheet.create({
    wrapper: {
        flex: 1,
        backgroundColor: '#DFDFDF'
    },
    checkoutButton: {
        height: 50,
        margin: 10,
        marginTop: 0,
        backgroundColor: '#2ABB9C',
        borderRadius: 2,
        alignItems: 'center',
        justifyContent: 'center'
    },
    main: {
        width, backgroundColor: '#DFDFDF'
    },
    checkoutTitle: {
        color: '#FFF',
        fontSize: 15,
        fontWeight: 'bold',
        fontFamily: 'Avenir'
    },
    productStyle: {
        flexDirection: 'row',
        margin: 10,
        padding: 10,
        backgroundColor: '#FFFFFF',
        borderRadius: 2,
        borderWidth: 0.7,
        borderColor: '#b7fc99',
        shadowColor: '#3B5458',
        shadowOffset: { width: 0, height: 3 },
        shadowOpacity: 0.2
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
        color: '#A7A7A7',
        fontWeight: '400',
        color: '#752ab7',
        fontFamily: 'Avenir',
        fontSize: 15        
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
    txtShowDetail: {
        color: '#C21C70',
        fontSize: 10,
        fontWeight: '400',
        fontFamily: 'Avenir',
        textAlign: 'right',
        borderWidth: 1,
        borderColor: '#c21c70',
        borderRadius: 5,
        padding: 5
    },
    showDetailContainer: {
        flex: 1,
        flexDirection: 'row',
        justifyContent: 'flex-end'
    }
});

export default CartView;
