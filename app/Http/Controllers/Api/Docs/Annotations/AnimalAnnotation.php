<?php

namespace App\Http\Controllers\Api\Docs\Annotations;

class AnimalAnnotation
{
    /**
     * @OA\Get(
     *   tags={"Animal"},
     *   path="/animal",
     *   summary="Get all animals data",
     *     @OA\Response(
     *         response=200,
     *         description="Success retrieve animals data",
     *         @OA\JsonContent(
     *             allOf={
     *                 @OA\Schema(ref="#/components/schemas/ResponseSchema"),
     *                 @OA\Schema(
     *                     @OA\Property(property="data", ref="#/components/schemas/AnimalList")
     *                 )
     *             }
     *         )
     *     ),

     * )
     */
    function animal() {}
    /**
     * @OA\Get(
     *   tags={"Animal"},
     *   path="/animal/{id}",
     *   summary="Get specific animal data",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *     description="ID of the animal to retrieve",
     *     @OA\Schema(type="integer")
     *   ),
     *     @OA\Response(
     *         response=200,
     *         description="Success retrieve animal data",
     *         @OA\JsonContent(
     *             allOf={
     *                 @OA\Schema(ref="#/components/schemas/ResponseSchema"),
     *                 @OA\Schema(
     *                     @OA\Property(property="data", ref="#/components/schemas/AnimalSchema")
     *                 )
     *             }
     *         )
     *     ),
     * )
     */
    function show() {}
    /**
     * @OA\Get(
     *   tags={"Animal"},
     *   path="/animal/{id}/type",
     *   summary="Get all animal types data",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *     description="ID of the animal to retrieve",
     *     @OA\Schema(type="integer")
     *   ),
     *     @OA\Response(
     *         response=200,
     *         description="Success retrieve animal types data",
     *         @OA\JsonContent(
     *             allOf={
     *                 @OA\Schema(ref="#/components/schemas/ResponseSchema"),
     *                 @OA\Schema(
     *                     @OA\Property(property="data", ref="#/components/schemas/TypeList")
     *                 )
     *             }
     *         )
     *     ),
     * )
     */
    function type() {}
    /**
     * @OA\Get(
     *   tags={"Animal"},
     *   path="/color",
     *   summary="Get all animals colors data",
     *     @OA\Response(
     *         response=200,
     *         description="Success retrieve animals colors data",
     *         @OA\JsonContent(
     *             allOf={
     *                 @OA\Schema(ref="#/components/schemas/ResponseSchema"),
     *                 @OA\Schema(
     *                     @OA\Property(property="data", ref="#/components/schemas/ColorList")
     *                 )
     *             }
     *         )
     *     ),
     * )
     */
    function color() {}
}
