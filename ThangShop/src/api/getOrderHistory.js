const getOrderHistory = (token) => (
    fetch('http://yoloshopvn.000webhostapp.com/api/user/order_history',
    {   
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            Accept: 'application/json'
        },
        body: JSON.stringify({ token })
    })
    .then(res => res.json())
);

module.exports = getOrderHistory;
