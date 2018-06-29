const searchProduct = (key) => {
    const url = `http://10.9.10.231/DoAnTotNghiep/webproduct/api/product/search?key-search=${key}`;
    return fetch(url)
    .then(res => res.json());
};

export default searchProduct;
