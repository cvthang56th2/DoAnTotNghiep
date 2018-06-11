const initData = () => (
    fetch('http://yoloshopvn.000webhostapp.com/api/home')// eslint-disable-line
    .then(res => res.json())
);

export default initData;
