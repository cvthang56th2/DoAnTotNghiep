const getOrderHistory = (token) => (
    fetch('http://10.5.8.155/DoAnTotNghiep/webproduct/api/user/order_history',
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
