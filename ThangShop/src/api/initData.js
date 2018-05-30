const initData = () => (
    fetch('http://10.130.50.43/DoAnTotNghiep/webproduct/api/home')// eslint-disable-line
    .then(res => res.json())
);

export default initData;
