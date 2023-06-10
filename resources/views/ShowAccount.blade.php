<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Accounts</title>
</head>
<body>
    <h1>User Accounts</h1>
    <a href="/client">Back</a>
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Password</th>
                <th>Full Name</th>
                <th>Account Type</th>
                <th>View</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ShowAccount as $user)
            <tr>
                <td>{{ $user->rerr_username }}<td>
                <td>{{ $user->rerr_password }}<td>
                <td>{{ $user->rerr_FullName }}<td>
                <td>{{ $user->rerr_accountType }}<td>
                <td><a href="register/{{$user->id}}">View</a></td>
                <td><a href="register/{{$user->id}}/edit">Edit</a></td>
                <td>
                    <form action="register/{{$user->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="DELETE">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>