<?php

namespace CursoLaravel\Criteria\Project;

use LucaDegasperi\OAuth2Server\Authorizer;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class ProjectOwner implements CriteriaInterface
{
    /**
     * @var Authorizer
     */
    private $authorizer;

    /**
     * @param Authorizer $authorizer
     */
    public function __construct(Authorizer $authorizer)
    {
        $this->authorizer = $authorizer;
    }

    /**
     * Apply criteria in query repository
     *
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $userId = $this->authorizer->getResourceOwnerId();

        return $model->where('owner_id', $userId);
    }
}
