<?php

namespace App\Repositories;

use App\Interfaces\ResourceRepositoryInterface;
use App\Http\Resources\Resource;
use App\Models\Resource as ResourceModel;

class ResourceRepository implements ResourceRepositoryInterface 
{
    public function getAllResources() 
    {
        return Resource::collection(ResourceModel::all());
    }
    public function createResource(array $resourceDetails) 
    {
        return ResourceModel::create($resourceDetails);
    }
}