<?php

namespace CursoLaravel\Repositories\Project;

use Prettus\Repository\Eloquent\BaseRepository;
use CursoLaravel\Entities\ProjectNote;

/**
 * Class ProjectNoteRepositoryEloquent
 *
 * @package namespace CursoLaravel\Repositories;
 */
class ProjectNoteRepositoryEloquent extends BaseRepository implements ProjectNoteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectNote::class;
    }
}
