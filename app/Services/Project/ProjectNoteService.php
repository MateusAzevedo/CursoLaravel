<?php

namespace CursoLaravel\Services\Project;

use CursoLaravel\Repositories\Project\ProjectNoteRepository;
use CursoLaravel\Validators\Project\ProjectNoteValidator;

class ProjectNoteService
{
    /**
     * @var ProjectNoteRepository
     */
    private $repository;

    /**
     * @var ProjectNoteValidator
     */
    private $validator;

    /**
     * @param ProjectNoteRepository $repository
     * @param ProjectNoteValidator $validator
     */
    public function __construct(ProjectNoteRepository $repository, ProjectNoteValidator $validator)
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
