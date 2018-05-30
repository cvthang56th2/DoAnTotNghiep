const signIn = (email, password) => (
    fetch('http://127.0.0.1/DoAnTotNghiep/webproduct/api/user/login',
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
