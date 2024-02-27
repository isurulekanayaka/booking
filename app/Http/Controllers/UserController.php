<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // dd($request);
        // Validate the incoming request data
        $validatedData=$request->validate([
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'email' => 'required|email|',
            'phone' => 'nullable|string|max:15',
            'password' => 'required|string|min:8',
            'user_role' => 'required|in:admin,user',
            'user_status' => 'required',
        ]);
        $user = User::create($validatedData);

        return redirect()->back()->with('success', 'User registered successfully!');

    }
    public function index()
    {
        $buses = Bus::all();

        return view(('user.home'),compact('buses'));
    }
    public function contact()
    {
        return view(('user.contactUs'));
    }
    public function fqa()
    {
        return view(('user.fqa'));
    }
    public function booking()
    {
        $busx = Bus::all();
        $buses = Bus::all();
        return view(('booking.booking'),compact('busx','buses'));
    }
    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', ['user' => $user]);
    }

    /**
     * Update the user's profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            // Add more validation rules as needed
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        // Update other user details as needed

        $user->save();

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully!');
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->user_role === 'admin') {
                return redirect()->intended('/tmp');
            } else {
                return redirect()->intended('/');
            }
        }

        return redirect()->back()->withInput($request->only('email'))->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function editUser(Request $request, $id){
        $user = User::find($id);

    if(!$user) {
        // Handle the case where the user with the given ID was not found
        abort(404);
    }
// dd($user);
    return view('admin.edit-user' , compact('user'));
    }

public function updateUser(Request $request, $id){
    $user = User::find($id);

    if(!$user) {
        abort(404);
    }

    $user->f_name = $request->input('f_name');
    $user->l_name = $request->input('l_name');
    $user->user_role = $request->input('user_role');
    $user->user_status = $request->input('user_status');
    $user->email = $request->input('email');
    $user->phone = $request->input('phone');
    $user->password = bcrypt($request->input('password')); // Remember to hash the password

    $user->save();

    return redirect()->back()->with('success', 'User updated successfully');
}
public function deleteUser(Request $request, $id){
    $user = User::find($id);

    if(!$user) {
        abort(404);
    }

    $user->delete();

    return redirect()->back()->with('success', 'User deleted successfully');
}

}
