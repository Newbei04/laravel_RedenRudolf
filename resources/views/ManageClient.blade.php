@extends('PageLayout.layout')
@section('title')
Manage Client
@endsection
    
<nav>
    <div>
      <h2>Manage Client</h2>
      <a href="client/create">Add Client</a>
      <a href="ShowAccount">USER ACCOUNTS</a>
      <form action="logout" method="post">
        @csrf
        <input type="submit" value="LOGOUT">
      </form>
      @if(session("success"))
        <h3><strong>{{session("success")}}</strong></h3>
      @endif
    </div>
  </nav>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Sex</th>
            <th>Contact Number</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->FirstName }}</td>
                <td>{{ $client->MiddleName }}</td>
                <td>{{ $client->LastName }}</td>
                <td>{{ $client->Sex }}</td>
                <td>{{ $client->Contact_Number }}</td>
                <td>{{ $client->Address }}</td>
                <td>
                    <td><a href="client/{{$client->id}}">Show</a></td>
                    <td><a href="client/{{$client->id}}/edit">EDIT</a></td>
                    <td>
                    <div>
                        <form action="client/{{$client->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" name="submit" value="DELETE" class="delete">
                        </form>
                    </div>
                </td>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="pagination">
    {{$clients->links()}}
</div>