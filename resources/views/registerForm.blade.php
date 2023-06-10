<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REGISTRATION</title>
</head>
<body>
    <h1>REGISTRATION</h1><br>
    <form action="/register" method="post">
        @csrf
        <label for="username">Username: </label>
        <input type="text" name="rerr_username"><br>
        <label for="password">Password: </label>
        <input type="text" name="rerr_password"><br>
        <label for="Full Name">Full Name: </label>
        <input type="text" name="rerr_FullName"><br>
        <label for="accountType">Account Type: </label>
        <select name="rerr_accountType" >
            <option value="">--ACCOUNT TYPE</option>
            <option value="Admin">Admin</option>
            <option value="User">User</option>
        </select><br>

        <div class="errors">
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <input type="submit" value="REGISTER"><br>
        <label for="login">Already Have an Account?</label><a href="Login">Log In Here</a>
    </form>
</body>
</html>