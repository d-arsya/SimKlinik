<?php

namespace App\Http\Controllers\Api\Docs\Annotations;

class ServiceAnnotation
{
    /**
     * @OA\Get(
     *   tags={"Service"},
     *   path="/service",
     *   summary="Get all services data",
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *   )
     * )
     */
    public function index() {}
}
