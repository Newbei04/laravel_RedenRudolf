<?php

namespace App\Http\Controllers;

use App\Models\rerr_user_accounts;
use Illuminate\Http\Request;
use Validator;
use Log;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ShowAccount()
    {
        $ShowAccount = rerr_user_accounts::all();
        return view('ShowAccount')->with('ShowAccount', $ShowAccount);
    }
    public function index()
    {
        return view('registerForm');
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
        $message = "Added new Account";
        Log::alert("$message");
        $validator = Validator::make(
            $request->all(),
            [
                "Username" => "required|min:3|max:30",
                "Password" => "required|min:8|max:30",
                "Full Name" => "required|min:3|max:30",
                "Account Type" => "required",

            ]
        );
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        };



        $user = new rerr_user_accounts;
        $user->rerr_username = $request->input('rerr_username');
        $user->rerr_password = $request->input('rerr_password');
        $user->rerr_FullName = $request->input('rerr_FullName');
        $user->rerr_accountType = $request->input('rerr_accountType');
        $user->save();

        return redirect('client');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $message = "View Account with the ID: $id";
        Log::alert("$message");
        $ShowAccount = rerr_user_accounts::find($id);
        return view('viewAccount')->with('register', $ShowAccount);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ShowAccounts = rerr_user_accounts::find($id);
        return view('editAccount')->with('register', $ShowAccounts);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ShowAccount = rerr_user_accounts::find($id);
        $ShowAccount->rerr_username = $request->input('rerr_username');
        $ShowAccount->rerr_password = $request->input('rerr_password');
        $ShowAccount->rerr_FullName = $request->input('rerr_FullName');
        $ShowAccount->rerr_accountType = $request->input('rerr_accountType');
        $ShowAccount->save();

        $validator = Validator::make(
            $request->all(),
            [
                "Username" => "required|min:3|max:30",
                "Password" => "required|min:8|max:30",
                "Full Name" => "required|min:3|max:30",
                "Account Type"=>"required",
            ]
        );
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        };

        $message = "Updated a Account information of $id";
        Log::alert("$message");

        return redirect('ShowAccount');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ShowAccount = rerr_user_accounts::find($id);
        $ShowAccount->delete();

        $message = "Deleted a Account with an ID: $id";
        Log::alert("$message");

        return redirect('ShowAccount');
    }
}