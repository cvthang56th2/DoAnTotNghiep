const getOrderHistory = (token) => (
    fetch('http://10.9.10.231/DoAnTotNghiep/webproduct/api/user/order_history',
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
