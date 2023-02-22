<?php

namespace App\Http\Controllers;

use App\Events\UserRegisteredEvent;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\auth\RegisterRequest;
use App\Models\User;
use App\Notifications\UserRegisterNotificationMail;
use ErrorException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public $model = NULL;

    public function __construct()
    {
        $this->model = new User;
    }

    public function login()
    {
        return view('auth.login');
    }
    public function processLogin(LoginRequest $request)
    {
        $validator =  $request->validated();
        try {
            $user = $this->model::where('email', $validator['email'])
                ->firstOrFail(['email', 'name', 'avatar', 'level', 'password']);
            if (!Hash::check($validator['password'], $user->password)) {
                throw new ErrorException("the password doesn't match the password comfirmation");
            }
            $request->session()->put('user', $user->getAttributes());
            return view('layouts.master');
        } catch (Exception $e) {
            return redirect('login');
        }
    }
    public function logout(Request $request)
    {
        if ($request->session()->has('user')) {
            $request->session()->forget('user');
        }
        return redirect('login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function processRegister(RegisterRequest $request)
    {
        $validator = $request->validated();
        $validator['password'] = Hash::make($validator['password']);
        $user = $this->model::create($validator);

        UserRegisteredEvent::dispatch($user);
        return redirect('login');
    }
}
