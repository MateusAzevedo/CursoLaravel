<?php

namespace CursoLaravel\Validators\Project;

use \Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator
{
    protected $rules = [
        'owner_id' => 'required|integer|exists:users,id',
        'client_id' => 'required|integer|exists:clients,id',
        'name' => 'required|min:3|max:255',
        'description' => 'required',
        'progress' => 'required|between:0,100',
        'status' => 'required|between:1,3',
        'due_date' => 'required|date',
    ];
}
