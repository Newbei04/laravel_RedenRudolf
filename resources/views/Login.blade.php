<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PAGE</title>
</head>
<body>
    <form action="/Login" method="post">
        <h1>LOGIN Form</h1>
        @csrf
        <label for="LOGIN">Log In</label></label><input type="text" name="rerr_username"><br>
        <label for="rerr_password">Password: </label><input type="password" name="rerr_password"><br>
        <input type="submit" value="LOGIN"><br>

        <label>Don't have account?</label><a href="register">Sign Up Here</a>
    </form>
</body>
</html>