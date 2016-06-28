<?php

namespace CursoLaravel\Services\Client;

use CursoLaravel\Repositories\Client\ClientRepository;
use CursoLaravel\Validators\Client\ClientValidator;

class ClientService
{
    /**
     * @var ClientRepository
     */
    private $clientRepository;

    /**
     * @var ClientValidator
     */
    private $validator;

    /**
     * @param ClientRepository $clientRepository
     * @param ClientValidator $validator
     */
    public function __construct(ClientRepository $clientRepository, ClientValidator $validator)
    {
        $this->clientRepository = $clientRepository;
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

        return $this->clientRepository->create($attributes);
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

        return $this->clientRepository->update($attributes, $id);
    }
}
