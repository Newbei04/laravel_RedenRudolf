<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Account</title>
</head>
<body>
    
    <span>Username: </span>{{ $register->rerr_username }} <br>
    <span>Password: </span>{{ $register->rerr_password }} <br>
    <span>Full Name: </span>{{ $register->rerr_FullName }} <br>
    <span>Account Type: </span>{{ $register->rerr_accountType }} <br>

</body>
</html>