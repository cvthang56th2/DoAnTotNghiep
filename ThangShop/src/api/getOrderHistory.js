const getOrderHistory = (token) => (
    fetch('http://127.0.0.1/DoAnTotNghiep/webproduct/api/user/order_history',
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
