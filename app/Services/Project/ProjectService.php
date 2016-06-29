<?php

namespace CursoLaravel\Services\Project;

use CursoLaravel\Repositories\Project\ProjectRepository;
use CursoLaravel\Validators\Project\ProjectValidator;

class ProjectService
{
    /**
     * @var ProjectRepository
     */
    private $repository;

    /**
     * @var ProjectValidator
     */
    private $validator;

    /**
     * @param ProjectRepository $repository
     * @param ProjectValidator $validator
     */
    public function __construct(ProjectRepository $repository, ProjectValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    /**
     * Save a new entity in repository.
     *
     * @param  array $attributes Request data
     * @return mixed
     */
    public function create(array $attributes)
    {
        $this->validator->with($attributes)->passesOrFail();

        return $this->repository->create($attributes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  array $attributes
     * @param  int $id
     * @return mixed
     */
    public function update(array $attributes, $id)
    {
        $this->validator->with($attributes)->passesOrFail();

        return $this->repository->update($attributes, $id);
    }
}
