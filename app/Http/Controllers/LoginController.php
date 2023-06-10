<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rerr_user_accounts;
use Illuminate\Support\Facades\Session;
use Validator;
use Log;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function SessionUserAccounts(){
        Session::forget('rerr_query');
        return view("Login");
        
    }
    
     public function index()
    {

        return view("Login");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('registerForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rerr_username = $request->input('rerr_username');
        $rerr_password = $request->input('rerr_password');

        $rerr_query = rerr_user_accounts::where("rerr_username", $rerr_username)->where("rerr_password", $rerr_password)->value("rerr_username");

        if ($rerr_query == "") {
            return view("Login");
        } else {
            Session::put('rerr_query', $rerr_query);
            return redirect('client');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $userAccounts = rerr_user_accounts::find($id);
        return view('ShowAccount')->with('user', $userAccounts);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}