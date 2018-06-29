const initData = () => (
    fetch('http://10.9.10.231/DoAnTotNghiep/webproduct/api/home')// eslint-disable-line
    .then(res => res.json())
);

export default initData;
