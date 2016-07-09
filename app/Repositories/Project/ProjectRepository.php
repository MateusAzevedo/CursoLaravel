<?php

namespace CursoLaravel\Repositories\Project;

use Prettus\Repository\Contracts\RepositoryCriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ProjectRepository
 *
 * @package namespace CursoLaravel\Repositories;
 */
interface ProjectRepository extends RepositoryInterface, RepositoryCriteriaInterface
{
    /**
     * Check if the user is the project owner.
     *
     * @param $projectId integer
     * @param $ownerId integer
     * @return boolean
     */
    public function isOwner($projectId, $ownerId);
}
