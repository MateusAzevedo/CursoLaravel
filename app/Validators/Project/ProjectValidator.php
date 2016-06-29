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
        'progress' => 'required|integer|min:0|max:100',
        'status' => 'required|integer|min:1|max:3',
        'due_date' => 'required|date',
    ];
}
