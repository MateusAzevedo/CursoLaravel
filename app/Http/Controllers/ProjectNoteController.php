<?php

namespace CursoLaravel\Http\Controllers;

use CursoLaravel\Repositories\Project\ProjectNoteRepository;
use CursoLaravel\Services\Project\ProjectNoteService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectNoteController extends Controller
{
    /**
     * @var ProjectNoteService
     */
    private $projectNoteService;

    /**
     * @var ProjectNoteRepository
     */
    private $projectNoteRepository;

    public function __construct(ProjectNoteService $projectNoteService, ProjectNoteRepository $projectNoteRepository)
    {
        $this->projectNoteService = $projectNoteService;
        $this->projectNoteRepository = $projectNoteRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param integer $projectId
     * @return Response
     */
    public function index($projectId)
    {
        return $this->projectNoteRepository->findByField('project_id', $projectId);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @param $projectId
     * @return Response
     */
    public function store(Request $request, $projectId)
    {
        return $this->projectNoteService->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param $projectId
     * @param $noteId
     * @return Response
     */
    public function show($projectId, $noteId)
    {
        // Retorna um array de notes, mesmo que só tem uma nota com esse id...
        // Seria necessário chamar o método first(), mas como ele faz parte
        // da Collection e depois vamos usar Presenter, creio que não vai funcionar.
        //return $this->projectNoteRepository->findWhere(['project_id' => $projectId, 'id' => $noteId])->first();

        // Assim retorna uma instância única, como deveria ser...
        return $this->projectNoteRepository->find($noteId);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param $projectId
     * @param $noteId
     * @return Response
     */
    public function update(Request $request, $projectId, $noteId)
    {
        return $this->projectNoteService->update($request->all(), $noteId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $projectId
     * @param $noteId
     * @return Response
     */
    public function destroy($projectId, $noteId)
    {
        $this->projectNoteRepository->delete($noteId);

        return response()->json([
            'message' => 'Project note deleted',
        ]);
    }
}
