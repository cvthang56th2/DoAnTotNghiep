const initData = () => (
    fetch('http://yoloshopvn.com/api/home')// eslint-disable-line
    .then(res => res.json())
);

export default initData;
