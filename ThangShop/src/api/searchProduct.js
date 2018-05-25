const searchProduct = (key) => {
    const url = `http://192.168.26.116/DoAnTotNghiep/webproduct/api/product/search?key-search=${key}`;
    return fetch(url)
    .then(res => res.json());
};

export default searchProduct;
