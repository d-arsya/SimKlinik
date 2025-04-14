<?php

namespace App\Http\Controllers\Api\Docs\Schemas;

/**
 * @OA\Schema(
 *     schema="CreateCheckupSchema",
 *     type="object",
 *     title="Checkup",
 *     @OA\Property(property="patient_id", type="integer", example=1),
 *     @OA\Property(property="pulse", type="number", format="float", example=73.9),
 *     @OA\Property(property="temperature", type="number", format="float", example=73.9),
 *     @OA\Property(property="breath", type="number", format="float", example=73.9),
 *     @OA\Property(property="weight", type="number", format="float", example=73.9),
 *     @OA\Property(property="vaccine_id", type="integer", example=1),
 *     @OA\Property(property="service", type="jsoin")
 * )
 * @OA\Schema(
 *     schema="CheckupSchema",
 *     type="object",
 *     title="Checkup",
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
 *     schema="CheckupList",
 *     type="array",
 *     @OA\Items(ref="#/components/schemas/CheckupSchema")
 * )
 */
class CheckupSchema {}
