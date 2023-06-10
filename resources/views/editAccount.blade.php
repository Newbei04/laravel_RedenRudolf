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
    <form action="/register/{{$register->id}}" method="post">
        @csrf
        @method('PUT')
        <label for="username">Username: </label>
        <input type="text" name="rerr_username" value="{{old('rerr_username',$register->rerr_username)}}"><br>
        <label for="password">Password: </label>
        <input type="text" name="rerr_password" value="{{old('rerr_password',$register->rerr_password)}}"><br>
        <label for="Full Name">Full Name: </label>
        <input type="text" name="rerr_FullName" value="{{old('rerr_FullName',$register->rerr_FullName)}}"><br>
        <label for="accountType">Account Type: </label>
        <select name="rerr_accountType" >
            <option value="{{$register->rerr_accountType}}">{{$register->rerr_accountType}}</option>
            <option value="Admin" @if(old('rerr_accountType')=='Admin')selected @endif>Admin</option>
            <option value="User" @if(old('rerr_accountType')=='Admin')selected @endif>User</option>
        </select><br>

        <input type="submit" value="UPDATE">
    </form>
</body>
</html>