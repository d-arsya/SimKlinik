<?php

namespace App\Http\Controllers\Api\Docs\Annotations;

class OwnerAnnotation
{
    /**
     * @OA\Get(
     *   tags={"Owner"},
     *   path="/owner",
     *   summary="Get all owners data",
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *   )
     * )
     */
    public function index() {}
    /**
     * @OA\Post(
     *   tags={"Owner"},
     *   path="/owner",
     *   summary="Store new owner data",
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *   )
     * )
     */
    public function store() {}
    /**
     * @OA\Get(
     *   tags={"Owner"},
     *   path="/owner/{id}",
     *   summary="Get owner data",
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *   )
     * )
     */
    public function show() {}
    /**
     * @OA\Put(
     *   tags={"Owner"},
     *   path="/owner/{id}",
     *   summary="Update owner data",
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *   )
     * )
     */
    public function update() {}
    /**
     * @OA\Delete(
     *   tags={"Owner"},
     *   path="/owner/{id}",
     *   summary="Delete owner data",
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *   )
     * )
     */
    public function destroy() {}
}
