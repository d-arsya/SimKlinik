<?php

namespace App\Http\Controllers\Api\Docs\Schemas;

/**
 * @OA\Schema(
 *     schema="AnimalSchema",
 *     type="object",
 *     title="Animal",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="code", type="string", example="ANM-0001"),
 *     @OA\Property(property="name", type="string", example="Marsudi Ian Pangestu M.Farm"),
 *     @OA\Property(property="pulse", type="number", format="float", example=73.9),
 *     @OA\Property(property="temperature", type="number", format="float", example=58),
 *     @OA\Property(property="breath", type="number", format="float", example=75.9),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-03-20T06:02:55.000000Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-03-20T06:02:55.000000Z")
 * )
 * @OA\Schema(
 *     schema="AnimalList",
 *     type="array",
 *     @OA\Items(ref="#/components/schemas/AnimalSchema")
 * )
 * @OA\Schema(
 *     schema="ColorSchema",
 *     type="object",
 *     title="Color",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="code", type="string", example="CLR-0001"),
 *     @OA\Property(property="name", type="string", example="Blue"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-03-20T06:02:55.000000Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-03-20T06:02:55.000000Z")
 * )
 * @OA\Schema(
 *     schema="ColorList",
 *     type="array",
 *     @OA\Items(ref="#/components/schemas/ColorSchema")
 * )
 * @OA\Schema(
 *     schema="TypeSchema",
 *     type="object",
 *     title="Type",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="code", type="string", example="CLR-0001"),
 *     @OA\Property(property="animal_id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Blue"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-03-20T06:02:55.000000Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-03-20T06:02:55.000000Z")
 * )
 * @OA\Schema(
 *     schema="TypeList",
 *     type="array",
 *     @OA\Items(ref="#/components/schemas/TypeSchema")
 * )
 */

class AnimalSchema {}
