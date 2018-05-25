import React, { Component } from 'react';
import { Navigator } from 'react-native-deprecated-custom-components';

import HomeView from './HomeView';
import ProductDetail from '../ProductDetail/ProductDetail';
import ListProduct from '../ListProduct/ListProduct';

class Home extends Component {
    render() {
        const { types, topProducts, slideList, dealProduct } = this.props;
        return (
            <Navigator
                initialRoute={{ name: 'HOME_VIEW' }}
                renderScene={(route, navigator) => {
                    switch (route.name) {
                        case 'HOME_VIEW': return <HomeView navigator={navigator} types={types} topProducts={topProducts} slideList={slideList} dealProduct={dealProduct} />;
                        case 'LIST_PRODUCT': return <ListProduct navigator={navigator} category={route.category} />;
                        default: return <ProductDetail navigator={navigator} product={route.product} />;
                    }
                }}
            />
        );
    }
}

export default Home;
