<?php

namespace App\Http\Controllers\Api\Docs\Annotations;

class PatientAnnotation
{
    /**
     * @OA\Get(
     *   tags={"Patient"},
     *   path="/patient",
     *   summary="Get all patients data",
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *   )
     * )
     */
    public function index() {}
    /**
     * @OA\Post(
     *   tags={"Patient"},
     *   path="/patient",
     *   summary="Store new patient data",
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *   )
     * )
     */
    public function store() {}
    /**
     * @OA\Get(
     *   tags={"Patient"},
     *   path="/patient/{id}",
     *   summary="Get patient data",
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *   )
     * )
     */
    public function show() {}
    /**
     * @OA\Put(
     *   tags={"Patient"},
     *   path="/patient/{id}",
     *   summary="Update patient data",
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *   )
     * )
     */
    public function update() {}
    /**
     * @OA\Delete(
     *   tags={"Patient"},
     *   path="/patient/{id}",
     *   summary="Delete patient data",
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *   )
     * )
     */
    public function destroy() {}
}
