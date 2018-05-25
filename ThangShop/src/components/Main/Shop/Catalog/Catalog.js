import React, { Component } from 'react';
import { Navigator } from 'react-native-deprecated-custom-components';

import CatalogView from './CatalogView';
import ProductDetail from '../ProductDetail/ProductDetail';
import ListProduct from '../ListProduct/ListProduct';

class Catalog extends Component {
    render() {
        const { types } = this.props;
        return (
            <Navigator
                initialRoute={{ name: 'CATALOG_VIEW' }}
                renderScene={(route, navigator) => {
                    switch (route.name) {
                        case 'CATALOG_VIEW': return <CatalogView navigator={navigator} types={types} />;
                        case 'LIST_PRODUCT': return <ListProduct navigator={navigator} category={route.category} />;
                        default: return <ProductDetail navigator={navigator} product={route.product} />;
                    }
                }}
            />
        );
    }
}

export default Catalog;
