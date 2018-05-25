import React, { Component } from 'react';
import { Navigator } from 'react-native-deprecated-custom-components';

import CartView from './CartView';
import ProductDetail from '../ProductDetail/ProductDetail';
import CheckOut from '../CheckOut/CheckOut';

class Cart extends Component {
    render() {
        const { cartArray } = this.props;
        return (
            <Navigator
                initialRoute={{ name: 'CART_VIEW' }}
                renderScene={(route, navigator) => {
                    switch (route.name) {
                        case 'CART_VIEW': return <CartView navigator={navigator} cartArray={cartArray} />;
                        case 'CHECK_OUT': return <CheckOut navigator={navigator} cartArray={cartArray} />;
                        default: return <ProductDetail navigator={navigator} product={route.product} />;
                    }
                }}
            />
        );
    }
}

export default Cart;
