<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
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
    public function auth(Request $request)
    {
        $formData = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // check user 
        // dd($request);
        if (auth()->attempt($formData, $request->has('remember'))) {
            return redirect('/');
        } else {
            return back()->withErrors(['email' => 'Invalid login info'])->onlyInput('email');
        }
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
        // $formData = $request->validate()
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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * logout user
     */
    public function logout(Request $request)
    {
        auth()->logout();

        // handle token 
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('msg', 'You have been logged out successfully');
    }
}
