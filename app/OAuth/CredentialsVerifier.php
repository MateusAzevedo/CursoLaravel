<?php

namespace CursoLaravel\OAuth;

use Illuminate\Support\Facades\Auth;

class CredentialsVerifier
{
    public function verify($username, $password)
    {
        $credentials = [
            'email' => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials))
        {
            return Auth::user()->id;
        }

        return false;
    }
}
