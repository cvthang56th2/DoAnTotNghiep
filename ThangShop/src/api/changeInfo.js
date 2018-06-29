const changeInfo = (token, name, phone, address, password) => (
    fetch('http://10.9.10.231/DoAnTotNghiep/webproduct/api/user/change_info',
    {   
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            Accept: 'application/json'
        },
        body: JSON.stringify({ token, name, phone, address, password})
    })
    .then(res => res.json())
);

module.exports = changeInfo;
