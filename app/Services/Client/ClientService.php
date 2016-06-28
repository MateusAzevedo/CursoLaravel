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
     * Retrieve all data of repository.
     *
     * @return mixed
     */
    public function listAll()
    {
        return $this->clientRepository->all();
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
     * Return the specified resource.
     *
     * @param  int $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->clientRepository->find($id);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return int
     */
    public function delete($id)
    {
        $this->clientRepository->delete($id);

        return $id;
    }
}
