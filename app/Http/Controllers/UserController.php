<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\{User,Country,State,City};

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data['users'] = User::whereRoleId('2')->orderBy('id','desc')->paginate(15);
        return view('users.index', $data);
    }
}
