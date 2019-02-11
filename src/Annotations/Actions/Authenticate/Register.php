<?php


/**
 * @OA\Post(
 *     path="/register",
 *     summary="Registers user",
 *     tags={"authenticate"},
 *     operationId="userRegister",
 *
 *     @OA\Response(
 *         response=201,
 *         description="Created",
 *         @OA\MediaType( mediaType="application/json")
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Unprocessable Entity",
 *         @OA\MediaType( mediaType="application/json")
 *     ),
 *     @OA\RequestBody(
 *          @OA\JsonContent(ref="#/components/schemas/User")
 *     )
 * )
 */