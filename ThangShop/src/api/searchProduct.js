const searchProduct = (key) => {
    const url = `http://10.5.8.155/DoAnTotNghiep/webproduct/api/product/search?key-search=${key}`;
    return fetch(url)
    .then(res => res.json());
};

export default searchProduct;
