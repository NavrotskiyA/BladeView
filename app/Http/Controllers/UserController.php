<?php

namespace App\Http\Controllers;

class UserController extends Controller
{

    public function registration()
    {
        return 'Registration method';
    }
    public function auth()
    {
        return 'Authorisation method';
    }

    public function show($id)
    {
        return 'Hello user with id '.$id;
    }
    public function delete($id)
    {
        return 'User with '.$id.' was deleted';
    }
    public function logOut()
    {
        return redirect(route('index'));
    }
}
