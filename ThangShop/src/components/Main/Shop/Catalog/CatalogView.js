import React, { Component } from 'react';
import { View, Text, StyleSheet, Image, Dimensions, SectionList, TouchableOpacity } from 'react-native';

import phoneIcon from '../../../../media/appIcon/phone.png';
import mailIcon from '../../../../media/appIcon/mail.png';
import contactIcon from '../../../../media/appIcon/contact.png';
import locationIcon from '../../../../media/appIcon/location.png';

class Catalog extends Component {
    gotoListProduct(category) {
        const { navigator } = this.props;
        navigator.push({ name: 'LIST_PRODUCT', category });
    }

    render() {
        const {
            mapContainer, wrapper, infoContainer,
            rowInfoContainer, imageStyle, infoText
        } = styles;
        const { types } = this.props;
        var sections = [];
        types.map(e => {
            sections.push({
                "id": e.id,
                "name": e.name,
                "site_title": e.site_title,
                "meta_desc": e.meta_desc,
                "meta_key": e.meta_key,
                "parent_id": e.parent_id,
                "sort_order": e.sort_order,
                "icon": e.icon,
                data: e.subs
            })
        });
        return (
            <View style={wrapper}>

                <View style={{ display: 'flex', alignItems: 'center' }}>
                    <Text style={{ fontSize: 20, fontWeight: 'bold' }}>Danh mục sản phẩm</Text>
                </View>
                <SectionList style={{ borderTopColor: '#d6d7da', borderTopWidth: 1 }}
                    sections={sections}
                    renderItem={({ item }) =>
                        <TouchableOpacity onPress={() => this.gotoListProduct(item)} key={item.id}>
                            <Text style={styles.item}>{item.name}</Text>
                        </TouchableOpacity>
                    }
                    renderSectionHeader={({ section }) =>
                        <TouchableOpacity onPress={() => this.gotoListProduct(section)} key={section.id} style={styles.sectionHeader}>
                            <Text style={styles.sectionHeaderText}>{section.name}</Text>
                            <Text style={{ color: "#42f4a4" }}>Tất cả</Text>
                        </TouchableOpacity>
                    }
                    keyExtractor={(item, index) => index}
                />

            </View>
        );
    }
}

const { width } = Dimensions.get('window');
const styles = StyleSheet.create({
    wrapper: { flex: 1, backgroundColor: '#F6F6F6', padding: 20 },
    sectionHeader: {
        paddingTop: 2,
        paddingLeft: 10,
        paddingRight: 10,
        paddingBottom: 2,
        backgroundColor: 'rgba(247,247,247,1.0)',
        borderWidth: 1,
        borderColor: '#d6d7da',
        display: 'flex', flexDirection: 'row',
        justifyContent: 'space-between',
    },
    sectionHeaderText: {
        fontSize: 18,
        fontWeight: 'bold',
    },
    item: {
        padding: 10,
        fontSize: 14,
        borderBottomWidth: 1,
        borderBottomColor: '#d6d7da',
    },
});

export default Catalog;
