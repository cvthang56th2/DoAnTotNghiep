const signIn = (email, password) => (
    fetch('http://10.130.50.43/DoAnTotNghiep/webproduct/api/user/login',
    {   
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            Accept: 'application/json'
        },
        body: JSON.stringify({ email, password })
    })
    .then(res => res.json())
);

module.exports = signIn;
