@extends('PageLayout.Layout')
@section('title')
Edit Client
@endsection


<form action="/client/{{$client->id}}" method="POST">
      @if(session("message"))
      <strong>{{session("message")}}</strong>
      @endif
    
    @csrf
    @method('PUT')
    <label>First Name: </label> <input type="text" name="FirstName" value="{{old("FirstName", $client->FirstName) }}"><br>
    <label>Middle Name: </label> <input type="text" name="MiddleName" value="{{old("MiddleName",$client->MiddleName) }}"><br>
    <label>Last Name: </label> <input type="text" name="LastName" value="{{old("LastName", $client->LastName) }}"><br>
    <label>Sex </label> <select id="Sex" name="Sex" >
        @foreach(['Female', 'Male'] as $sex)
            <option value="{{$sex}}" {{$client->Sex == $sex ? 'selected' : ''}}>{{$sex}}</option>
        @endforeach
    </select><br>
    
    <label>Contact_Number: </label><input type="text" name="Contact_Number" value="{{old("Contact_Number", $client->Contact_Number) }}"><br>
    <label>Address: </label> <input type="text" name="Address" value="{{old("Address", $client->Address) }}"><br>
    
    <div class="errors">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <input type="submit" name="submit" value="UPDATE">
</form>

