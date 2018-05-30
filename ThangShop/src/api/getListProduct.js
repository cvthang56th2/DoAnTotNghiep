const getListProduct = (idType, page) => {
    let url;
    if (idType == null) {
        url = `http://127.0.0.1/DoAnTotNghiep/webproduct/api/product/index/${page}`;
    } else {
        url = `http://127.0.0.1/DoAnTotNghiep/webproduct/api/product/catalog/${idType}/${page}`;
    }
    
    return fetch(url)
    .then(res => res.json());
};

export default getListProduct;
