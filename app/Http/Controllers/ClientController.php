<?php

namespace CursoLaravel\Http\Controllers;

use CursoLaravel\Repositories\Client\ClientRepositoryEloquent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use CursoLaravel\Http\Requests;
use CursoLaravel\Entities\Client;

class ClientController extends Controller
{
    /**
     * @var ClientRepositoryEloquent
     */
    private $clientRepository;

    public function __construct(ClientRepositoryEloquent $clientRepositoryEloquent)
    {
        $this->clientRepository = $clientRepositoryEloquent;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return $this->clientRepository->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        return $this->clientRepository->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return $this->clientRepository->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        return $this->clientRepository->update($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->clientRepository->delete($id);

        return $id;
    }
}
