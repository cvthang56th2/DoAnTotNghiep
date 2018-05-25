const signIn = (email, password) => (
    fetch('http://192.168.26.116/DoAnTotNghiep/webproduct/api/user/login',
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
