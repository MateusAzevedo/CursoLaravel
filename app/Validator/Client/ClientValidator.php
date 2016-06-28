<?php

namespace CursoLaravel\Validator\Client;

use Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator
{
    protected $rules = [
        'name' => 'required|min:3|max:255',
        'responsible' => 'required|min:3|max:255',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required',
    ];
}
