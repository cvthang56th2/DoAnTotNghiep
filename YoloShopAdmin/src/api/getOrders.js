const getOrders = () => (
  fetch('http://yoloshopvn.com/api/order/get_list_order')// eslint-disable-line
  .then(res => res.json())
);

export default getOrders;
