const register = (email, name, password, address, phone) => (
    fetch('http://192.168.26.116/DoAnTotNghiep/webproduct/api/user/register',
    {   
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            Accept: 'application/json'
        },
        body: JSON.stringify({ email, name, password, address, phone })
    })
    .then(res => res.text())
);

module.exports = register;