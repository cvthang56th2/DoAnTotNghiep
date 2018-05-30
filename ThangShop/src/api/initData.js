const initData = () => (
    fetch('http://127.0.0.1/DoAnTotNghiep/webproduct/api/home')// eslint-disable-line
    .then(res => res.json())
);

export default initData;
