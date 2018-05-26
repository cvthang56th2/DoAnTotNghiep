import React, { Component } from 'react';
import {
    View, Text, Image, StyleSheet, Dimensions, TouchableOpacity, ListView
} from 'react-native';

const url = 'http://192.168.26.116/DoAnTotNghiep/webproduct/upload/product/';

export default class TopProduct extends Component {
    gotoDetail(product) {
        const { navigator } = this.props;
        navigator.push({ name: 'PRODUCT_DETAIL', product });
    }
    render() {
        const {
            container, titleContainer, title,
            body, productContainer, productImage,
            produceName, producePrice, produceOldPrice
        } = styles;
        const { topProducts } = this.props;
        return (
            <View style={container}>
                <View style={titleContainer}>
                    <Text style={title}>Sản phẩm bán chạy</Text>
                </View>

                <ListView
                    contentContainerStyle={body}
                    enableEmptySections
                    dataSource={new ListView.DataSource({ rowHasChanged: (r1, r2) => r1 !== r2 }).cloneWithRows(topProducts)}
                    renderRow={product => (
                        <TouchableOpacity style={productContainer} onPress={() => this.gotoDetail(product)}>
                            <View style={{ display: 'flex', alignItems: 'center' }}>
                                <View style={{
                                    padding: 10,
                                    borderColor: '#2E272B',
                                    borderWidth: 0.5
                                }}>
                                    <Image source={{ uri: `${url}${product.image_link}` }} style={productImage} />
                                </View>
                            </View>
                            <Text style={produceName}>{product.name.toUpperCase()}</Text>
                            {
                                product.discount == 0 ? 
                                <Text style={producePrice}>{product.price} đ</Text>: (
                                    <View>
                                        <Text style={producePrice}>{product.price - product.discount} đ</Text>
                                        <Text style={produceOldPrice}>{product.price} đ</Text>
                                    </View>
                                )
                            }
                        </TouchableOpacity>
                    )}
                    renderSeparator={(sectionId, rowId) => {
                        if (rowId % 2 === 1) return <View style={{ width, height: 10 }} />;
                        return null;
                    }}
                />
            </View>
        );
    }
}

const { width } = Dimensions.get('window');
const imageWidth = width / 4;
const imageHeight = (imageWidth * 300) / 300;

const styles = StyleSheet.create({
    container: {
        backgroundColor: '#fff',
        margin: 10,
        shadowColor: '#2E272B',
        shadowOffset: { width: 0, height: 3 },
        shadowOpacity: 0.2,
        borderWidth: 0.7,
        borderColor: '#fda',
        borderRadius: 4
    },
    titleContainer: {
        height: 50,
        justifyContent: 'center',
        paddingLeft: 10
    },
    title: {
        color: '#D3D3CF',
        fontSize: 20
    },
    body: {
        flexDirection: 'row',
        justifyContent: 'space-around',
        flexWrap: 'wrap',
        paddingBottom: 10
    },
    productContainer: {
        width: '48%',
        shadowColor: '#2E272B',
        shadowOffset: { width: 0, height: 3 },
        shadowOpacity: 0.2,
        borderWidth: 0.7,
        borderColor: '#fda',
        borderRadius: 4,
        padding: 10
    },
    productImage: {
        width: imageWidth,
        height: imageHeight
    },
    produceName: {
        marginVertical: 5,
        paddingLeft: 10,
        fontFamily: 'Avenir',
        color: '#D3D3CF',
        fontWeight: '500'
    },
    producePrice: {
        marginBottom: 5,
        paddingLeft: 10,
        fontFamily: 'Avenir',
        color: '#662F90'
    },
    produceOldPrice: {
        textDecorationLine: 'line-through',
        textDecorationStyle: 'solid'
    }
});