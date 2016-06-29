<?php

namespace CursoLaravel\Entities;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'client_id',
        'owner_id',
        'name',
        'description',
        'progress',
        'status',
        'due_date',
    ];

    public function notes()
    {
        return $this->hasMany(ProjectNote::class);
    }
}
