<?php

namespace CursoLaravel\Services\Client;

use CursoLaravel\Repositories\Client\ClientRepository;
use CursoLaravel\Validators\Client\ClientValidator;

class ClientService
{
    /**
     * @var ClientRepository
     */
    private $repository;

    /**
     * @var ClientValidator
     */
    private $validator;

    /**
     * @param ClientRepository $repository
     * @param ClientValidator $validator
     */
    public function __construct(ClientRepository $repository, ClientValidator $validator)
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
