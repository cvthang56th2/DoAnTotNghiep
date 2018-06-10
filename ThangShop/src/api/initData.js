const initData = () => (
    fetch('http://10.5.8.155/DoAnTotNghiep/webproduct/api/home')// eslint-disable-line
    .then(res => res.json())
);

export default initData;
