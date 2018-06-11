const getListProduct = (idType, page) => {
    let url;
    if (idType == null) {
        url = `http://yoloshopvn.000webhostapp.com/api/product/index/${page}`;
    } else {
        url = `http://yoloshopvn.000webhostapp.com/api/product/catalog/${idType}/${page}`;
    }
    
    return fetch(url)
    .then(res => res.json());
};

export default getListProduct;
