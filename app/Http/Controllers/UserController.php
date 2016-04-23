<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;



class UserController extends Controller
{
    public function postSignUp(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'username' => 'required|max:25',
            'password' => 'required|min:6'
        ]);

        $email = $request['email'];
        $username = $request['username'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->email = $email;
        $user->username = $username;
        $user->password = $password;

        $user->save();

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function postSignIn(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->route('dashboard');
        }
        return redirect()->back();
    }
    
    public function getLogout()
    {
        Auth::logout();
        
        return redirect()->route('home');
    }

    public function getAccount()
    {
        return view('account', ['user' => Auth::user()]);
    }

    public function postUpdateAccount(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
        ]);
        $user = Auth::user();
        $user->username = $request['username'];
        $message = '';
        if($user->update()) {
            $message = 'Account successfully updated!';
        }
        $file = $request->file('account_photo');
        $filename = $request['username'] . '-' . $user->id . '.jpg';
        if ($file) {
            Storage::disk('public')->put($filename, File::get($file));
        }
        return redirect()->route('account')->with(['message' => $message]);

    }

    public function getUserPhoto($filename)
    {
        $file = Storage::disk('public')->get($filename);
        return new Response($file, 200);
    }
}