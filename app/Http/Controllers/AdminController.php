<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request){
        $admin = $request->only(['email', 'password']);
        if(Auth::attempt($admin)){
            if(Auth::user()->isAdmin()) {
                return redirect(route('adminProducts_all'));
            }else{
                return redirect(route('home'))->with('warning', 'Ваш аккаунт еще не подтвержден');
            }
        }
        else{
            return redirect(route('home'))->with('danger', 'Введены неверные данные');

        }
    }
    public function save(AdminRequest $request){
        if($request->password != $request->password2){
            return redirect(route('reg_page'))->with('danger', 'Пароли не совпадают');
        }
        $request = $request->only(['email', 'name','password', 'password2']);
        $user= User::create($request);
        if($user){
            Auth::login($user);
            return redirect(route('home'))->with('warning', 'Ваш аккаунт создан, ожидайте подтверждения.');
        }
    }
}
