const sendOrder = (token, arrayDetail, name, email, address, phone) => {
    const data = { token, arrayDetail, name, email, address, phone };
    return fetch('http://127.0.0.1/DoAnTotNghiep/webproduct/api/order',
    {   
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            Accept: 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(res => res.text())
};

module.exports = sendOrder;
