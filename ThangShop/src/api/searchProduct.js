const searchProduct = (key) => {
    const url = `http://127.0.0.1/DoAnTotNghiep/webproduct/api/product/search?key-search=${key}`;
    return fetch(url)
    .then(res => res.json());
};

export default searchProduct;
