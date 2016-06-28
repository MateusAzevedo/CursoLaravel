<?php

namespace CursoLaravel\Http\Controllers;

use CursoLaravel\Repositories\Client\ClientRepository;
use CursoLaravel\Services\Client\ClientService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    /**
     * @var ClientService
     */
    private $clientService;

    /**
     * @var ClientRepository
     */
    private $clientRepository;

    public function __construct(ClientService $clientService, ClientRepository $clientRepository)
    {
        $this->clientService = $clientService;
        $this->clientRepository = $clientRepository;
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
        return $this->clientService->create($request->all());
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
        return $this->clientService->update($request->all(), $id);
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

        return response()->json([
            'message' => 'Client deleted',
        ]);
    }
}
