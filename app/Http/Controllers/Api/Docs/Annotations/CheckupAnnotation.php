<?php

namespace App\Http\Controllers\Api\Docs\Annotations;

class CheckupAnnotation
{
    // /**
    //  * @OA\Get(
    //  *   tags={"Checkup"},
    //  *   path="/checkup",
    //  *   summary="Get all checkups data",
    //  *   @OA\Response(
    //  *     response=200,
    //  *     description="OK",
    //  *   )
    //  * )
    //  */
    // public function index() {}
    /**
     * @OA\Post(
     *   tags={"Checkup"},
     *   path="/checkup",
     *   summary="Store new checkup data",
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *   )
     * )
     */
    public function store() {}
    /**
     * @OA\Get(
     *   tags={"Checkup"},
     *   path="/checkup/{id}",
     *   summary="Get checkup data",
     *     @OA\Response(
     *         response=200,
     *         description="Success retrieve checkup data",
     *         @OA\JsonContent(
     *             allOf={
     *                 @OA\Schema(ref="#/components/schemas/ResponseSchema"),
     *                 @OA\Schema(
     *                     @OA\Property(property="data", ref="#/components/schemas/CheckupSchema")
     *                 )
     *             }
     *         )
     *     ),
     * )
     */
    public function show() {}
    /**
     * @OA\Put(
     *   tags={"Checkup"},
     *   path="/checkup/{id}",
     *   summary="Update checkup data",
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *   )
     * )
     */
    public function update() {}
    // /**
    //  * @OA\Delete(
    //  *   tags={"Checkup"},
    //  *   path="/checkup/{id}",
    //  *   summary="Delete checkup data",
    //  *   @OA\Response(
    //  *     response=200,
    //  *     description="OK",
    //  *   )
    //  * )
    //  */
    // public function destroy() {}
}
