const checkLogin = (token) => (
    fetch('http://192.168.26.116/DoAnTotNghiep/webproduct/api/user/check_login',
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
