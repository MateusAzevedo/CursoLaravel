<?php

namespace CursoLaravel\Validators\Project;

use \Prettus\Validator\LaravelValidator;

class ProjectNoteValidator extends LaravelValidator
{
    protected $rules = [
        'project_id' => 'required|integer|exists:projects,id',
        'note' => 'required',
    ];
}
