<?php

namespace App\Interfaces;

interface ResourceRepositoryInterface 
{
    public function getAllResources();
    // public function getResourceById($resource_id);
    // public function deleteResource($resource_id);
    public function createResource(array $resourceDetails);
}