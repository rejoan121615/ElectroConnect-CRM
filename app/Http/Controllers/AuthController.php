<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.auth.login');
    }


    /**
     * Authenticate user
     */
    public function auth () {

        return view('pages.auth.login');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        

        $formData = $request->validate([
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'username' => ['required', 'min:5', Rule::unique('users', 'username')],
            'password' => ['required', 'confirmed']
        ]);

        // hash password 
        $formData['password'] = bcrypt($formData['password']);
        
        // store user 
        $user = User::create($formData);


        // authenticate user 
        Auth()->login($user);


        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
