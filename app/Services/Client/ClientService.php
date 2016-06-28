<?php

namespace CursoLaravel\Services\Client;

use CursoLaravel\Repositories\Client\ClientRepository;

class ClientService
{
    /**
     * @var ClientRepository
     */
    private $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    /**
     * Save a new entity in repository.
     *
     * @param  array $attributes Request data
     * @return mixed
     */
    public function create(array $attributes)
    {
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
        return $this->clientRepository->update($attributes, $id);
    }
}
