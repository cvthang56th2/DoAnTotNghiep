const initData = () => (
    fetch('http://192.168.26.116/DoAnTotNghiep/webproduct/api/home')// eslint-disable-line
    .then(res => res.json())
);

export default initData;
