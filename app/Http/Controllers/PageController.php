<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Data;

class PageController extends Controller
{
    public function mainPage()
    {
        return view('mainPage', ['span_auth' => 'Авторизуйтесь',
                                 'span_reg' => 'зарегистрируйтесь.',
                                 'auth_button' => 'Авторизоваться',
                                 'reg_button' => 'Зарегистрироваться',
                                 'title' => 'Приложение']);
    }

    public function logPage()
    {
        return view('logPage', ['text' => 'Заполните поля.',
                                'title' => 'Авторизация',

                                'field_email' => '> введите почту',
                                'field_password' => '> введите пароль',

                                'button_text' => 'продолжить']);
    }

    public function regPage()
    {
        return view('regPage', ['text' => 'Заполните поля.',
                                'title' => 'Регистрация',

                                'field_email' => '> введите почту',
                                'field_password' => '> введите пароль',

                                'filed_first_name' => '> введите имя',
                                'filed_second_name' => '> введите фамилию',
                                'filed_last_name' => '> введите отчество',

                                'filed_passport_series' => '> введите серию',
                                'filed_passport_number' => '> введите номер',

                                'button_text' => 'зарегистрироваться']);
    }

    public function personal(Request $request)
    {
        $userId = session('userId');
        $user = Data::find($userId);
        $first_name = $user -> first_name;
        $second_name = $user -> second_name;
        $last_name = $user -> last_name;

        $passport_series = $user -> passport_series;
        $passport_number = $user -> passport_number;

        $email = $user -> email;

        return view('personalPage', ['title' => 'Личный кабинет',

                                     'userData' => 'Ф.И.О.',
                                     'passportData' => 'Паспортные данные',
                                     'emailData' => 'Электронная почта',

                                     'first_name' => $first_name,
                                     'second_name' => $second_name,
                                     'last_name' => $last_name,

                                     'passport_series' => $passport_series,
                                     'passport_number' => $passport_number,

                                     'email' => $email]);
    }

    public function logCheck(Request $request)
    {
        $userEmail = $request -> input('email');

        $validator = Validator::make($request -> all(), [
            'email' => 'required|email',
        ]);

        if ($validator -> fails()) {
            return redirect() -> back() -> withErrors($validator);
        }

        $user = Data::where('email', $userEmail) -> first();

        if ($user) {
            if (Hash::check($request -> input('pass'), $user -> password)) {
                session(['userId' => $user->id]);
                return redirect()->route('user');
            } 
            else {
                return redirect() -> back() -> withErrors(['login' => 'Неверный пароль!']);
            }
        } else {
            return redirect() -> back() -> withErrors(['login' => 'Аккаунт не найден!']);
        }
    }
                                    
    public function regCheck(Request $request)
    {
        $valid = $request->validate([
            'email' => 'required|email|max:30|unique:users', 
            'pass' => 'required|min:8',

            'first_name' => 'required|max:30',
            'second_name' => 'required|max:30',
            'last_name' => 'required|max:30',

            'passport_series' => 'required|min:4|max:4',
            'passport_number' => 'required|min:6|max:6' 
        ]);

        $user = new Data();

        $user -> email = $request -> input('email');
        $user -> password = Hash::make($request -> input('pass')); 
        $user -> first_name = $request -> input('first_name');
        $user -> second_name = $request -> input('second_name');
        $user -> last_name = $request -> input('last_name');
        $user -> passport_series = $request -> input('passport_series');
        $user -> passport_number = $request -> input('passport_number');
 
        $user -> save();

        return redirect()->route('login');
    }
}
