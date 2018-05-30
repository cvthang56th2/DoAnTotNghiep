const register = (email, name, password, address, phone) => (
    fetch('http://10.130.50.43/DoAnTotNghiep/webproduct/api/user/register',
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
