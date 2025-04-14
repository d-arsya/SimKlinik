<?php

namespace App\Http\Controllers\Api\Docs\Annotations;

class LocationAnnotation
{
    /**
     * @OA\Get(
     *   tags={"Location"},
     *   path="/province",
     *   summary="Get all provinces data",
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *   )
     * )
     */
    public function province() {}
    /**
     * @OA\Get(
     *   tags={"Location"},
     *   path="/city/{province}",
     *   summary="Get all cities data on province",
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *   )
     * )
     */
    public function city() {}
    /**
     * @OA\Get(
     *   tags={"Location"},
     *   path="/district/{city}",
     *   summary="Get all districts data on city",
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *   )
     * )
     */
    public function district() {}
    /**
     * @OA\Get(
     *   tags={"Location"},
     *   path="/village/{district}",
     *   summary="Get all villages data on district",
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *   )
     * )
     */
    public function village() {}
}
