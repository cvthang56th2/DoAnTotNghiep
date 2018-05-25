import React, { Component } from 'react';
import { ScrollView } from 'react-native';
import Category from './Category';
import Slide from './Slide';
import NewProduct from './NewProduct';
import DealProduct from './DealProduct';

import TopProduct from './TopProduct';

class HomeView extends Component {
    render() {
        const { types, topProducts, slideList, dealProduct } = this.props;
        return (
            <ScrollView style={{ flex: 1, backgroundColor: '#DBDBD8' }}>
                <Slide slideList={slideList} />
                <NewProduct navigator={this.props.navigator} />
                <Category navigator={this.props.navigator} types={types} />
                <DealProduct navigator={this.props.navigator} dealProduct={dealProduct} />
                <TopProduct navigator={this.props.navigator} topProducts={topProducts} />
            </ScrollView>
        );
    }
}

export default HomeView;
