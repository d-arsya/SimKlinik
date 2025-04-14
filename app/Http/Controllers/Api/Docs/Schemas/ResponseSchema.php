<?php

namespace App\Http\Controllers\Api\Docs\Schemas;

/**
 * @OA\Schema(
 *     schema="ResponseSchema",
 *     type="object",
 *     @OA\Property(property="success", type="boolean", example=true),
 *     @OA\Property(property="code", type="integer", example=200),
 *     @OA\Property(property="message", type="string", example="Success message"),
 *     @OA\Property(property="data", type="object")
 * )
 */

class ResponseSchema {}
