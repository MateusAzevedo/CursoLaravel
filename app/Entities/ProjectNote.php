<?php

namespace CursoLaravel\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectNote extends Model
{
    protected $fillable = ['project_id', 'note'];

    public function project()
    {
        return $this->belongsTo(ProjectNote::class);
    }
}
