const getListProduct = (idType, page) => {
    let url;
    if (idType == null) {
        url = `http://192.168.26.116/DoAnTotNghiep/webproduct/api/product/index/${page}`;
    } else {
        url = `http://192.168.26.116/DoAnTotNghiep/webproduct/api/product/catalog/${idType}/${page}`;
    }
    
    return fetch(url)
    .then(res => res.json());
};

export default getListProduct;
