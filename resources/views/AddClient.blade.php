@extends('PageLayout.Layout')
@section('title')
Add Client
@endsection

<form action="/client" method="POST">
    @csrf
    First Name: <input type="text" name="FirstName" value="{{old("FirstName")}}"><br>
    Middle Name: <input type="text" name="MiddleName" value="{{old("MiddleName")}}"><br>
    Last Name: <input type="text" name="LastName" value="{{old("LastName")}}"><br>
    Sex: <select id="Sex" name="Sex">
        <option value="">--SELECT GENDER--</option>
        <option value="Female" @if(old('Sex')=='Female' ) selected @endif>Female</option>
        <option value="Female" @if(old('Sex')=='Male' ) selected @endif>Male</option>
    </select><br>
    Contact Number: <input type="text" name="Contact_Number" value="{{old("Contact_Number")}}"><br>
    Address: <input type="text" name="Address" value="{{old("Address")}}"><br>

    <div class="errors">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <input type="submit" name="submit" value="SAVE">
</form>



