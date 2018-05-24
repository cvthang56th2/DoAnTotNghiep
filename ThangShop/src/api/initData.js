const initData = () => (
    fetch('http://192.168.26.117/api/')// eslint-disable-line
    .then(res => res.json())
);

export default initData;
