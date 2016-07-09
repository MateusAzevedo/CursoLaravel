<?php

namespace CursoLaravel\Http\Middleware;

use League\OAuth2\Server\Exception\AccessDeniedException;
use LucaDegasperi\OAuth2Server\Authorizer;
use Closure;
use CursoLaravel\Repositories\Project\ProjectRepository;

class CheckProjectOwner
{
    /**
     * @var ProjectRepository
     */
    private $repository;

    /**
     * @var Authorizer
     */
    private $authorizer;

    /**
     * @param ProjectRepository $repository
     * @param Authorizer $authorizer
     */
    public function __construct(ProjectRepository $repository, Authorizer $authorizer)
    {

        $this->repository = $repository;
        $this->authorizer = $authorizer;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     * @throws AccessDeniedException
     */
    public function handle($request, Closure $next)
    {
        $userId = $this->authorizer->getResourceOwnerId();
        $projectId = $request->route('project');

        if ($this->repository->isOwner($projectId, $userId) === false)
        {
            throw new AccessDeniedException;
        }

        return $next($request);
    }
}
