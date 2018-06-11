const checkLogin = (token) => (
    fetch('http://yoloshopvn.000webhostapp.com/api/user/check_login',
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
