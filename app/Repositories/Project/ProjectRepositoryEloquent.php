<?php

namespace CursoLaravel\Repositories\Project;

use CursoLaravel\Entities\Project;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class ProjectRepositoryEloquent
 *
 * @package namespace CursoLaravel\Repositories;
 */
class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Project::class;
    }

    public function isOwner($projectId, $userId)
    {
        $project = $this->skipPresenter()->find($projectId, ['owner_id']);

        if ($project->owner_id === (int)$userId)
        {
            return true;
        }

        return false;
    }
}
