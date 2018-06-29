const register = (email, name, password, address, phone) => (
    fetch('http://10.9.10.231/DoAnTotNghiep/webproduct/api/user/register',
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
