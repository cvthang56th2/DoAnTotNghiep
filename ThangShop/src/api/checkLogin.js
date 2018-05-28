const checkLogin = (token) => (
    fetch('http://10.130.50.43/DoAnTotNghiep/webproduct/api/user/check_login',
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

module.exports = checkLogin;
