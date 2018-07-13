const getOrders = () => (
  fetch('http://yoloshopvn.com/api/stats/get_stats')// eslint-disable-line
  .then(res => res.json())
);

export default getOrders;
