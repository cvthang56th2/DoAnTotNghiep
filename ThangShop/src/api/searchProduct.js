const searchProduct = (key) => {
    const url = `http://yoloshopvn.000webhostapp.com/api/product/search?key-search=${key}`;
    return fetch(url)
    .then(res => res.json());
};

export default searchProduct;
