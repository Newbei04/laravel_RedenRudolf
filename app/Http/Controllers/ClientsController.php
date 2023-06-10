<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Validator;
use Illuminate\Support\Facades\Auth;
use Log;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('Login');
    }
     public function index()
    {
        $clients = Client::paginate(2);
        return view("manageClient")->with("clients", $clients);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("AddClient");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = "Added new client";
        Log::alert("$message");


        $validator = Validator::make(
            $request->all(),
            [
                "FirstName" => "required|min:3|max:30",
                "MiddleName" => "required|min:3|max:30",
                "LastName" => "required|min:3|max:30",
                "Sex"=>"required",
                "Contact_Number" => "required|min:11|max:11",
                "Address" => "required|min:3|max:255",

            ]
        );
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        ;

        $clients = new Client;
        $clients->FirstName = $request->input('FirstName');
        $clients->MiddleName = $request->input('MiddleName');
        $clients->LastName = $request->input('LastName');
        $clients->Sex = $request->input('Sex');
        $clients->Contact_Number = $request->input('Contact_Number');
        $clients->Address = $request->input('Address');
        $clients->save();
        return redirect('/client')->with('success', 'Client added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $client = Client::find($id);
        $message = "View client with the ID: $id";
        Log::alert("$message");
        return view("ShowClient")->with("client", $client);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $clients = Client::find($id);
        return view("EditClient")->with("client", $clients);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $clients = Client::find($id);
        $clients->FirstName = $request->FirstName;
        $clients->MiddleName = $request->MiddleName;
        $clients->LastName = $request->LastName;
        $clients->Sex = $request->Sex;
        $clients->Contact_Number = $request->Contact_Number;
        $clients->Address = $request->Address;
        $clients->save();

        $message = "Updated a client of $id";
        Log::alert("$message");

        $validator = Validator::make(
            $request->all(),
            [
                "FirstName" => "required|min:3|max:30",
                "MiddleName" => "required|min:3|max:30",
                "LastName" => "required|min:3|max:30",
                "Sex"=>"required",
                "Contact_Number" => "required|min:11|max:11",
                "Address" => "required|min:3|max:255",

            ]

        );
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        return redirect('client')->with('success', 'Client updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = "Deleted a client with an ID: $id";
        Log::alert("$message");

        $clients = Client::find($id);
        $clients->delete();
        return redirect('client')->with('success', 'Client deleted successfully');
    }
}