@extends('PageLayout.layout')
@section('title')
View Client
@endsection

<p>
	{{$client->FirstName}} <br>
	{{$client->MiddleName}} <br>
	{{$client->LastName}} <br>
	{{$client->Sex}} <br>
	{{$client->Contact_Number}} <br>
	{{$client->Address}} 
</p>
