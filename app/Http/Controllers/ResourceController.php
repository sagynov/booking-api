<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Interfaces\ResourceRepositoryInterface;

class ResourceController extends Controller
{
    private ResourceRepositoryInterface $resourceRepository;

    public function __construct(ResourceRepositoryInterface $resourceRepository) 
    {
        $this->resourceRepository = $resourceRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data' => $this->resourceRepository->getAllResources()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $resourceDetails = $request->only([
            'name',
            'type',
            'description',
        ]);
        return response()->json([
            'data' => $this->resourceRepository->createResource($resourceDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new Resource(ResourceModel::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
