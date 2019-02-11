<?php


/**
 * @OA\Post(
 *     path="/login",
 *     summary="Login user and returns JWT token",
 *     tags={"authenticate"},
 *     operationId="userLogin",
 *
 *     @OA\Response(
 *         response=200,
 *         description="Success",
 *         @OA\MediaType( mediaType="application/json")
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Unprocessable Entity",
*          @OA\MediaType( mediaType="application/json")
 *     ),
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *              @OA\Property(
 *                  property="email",
 *                  example="r.szymanski@mindz.it",
 *                  type="string",
 *              ),
 *              @OA\Property(
 *                  property="password",
 *                  example="",
 *                  type="string",
 *              ),
 *                  @OA\Property(
 *                  property="remember",
 *                  example=true,
 *                  type="booleam",
 *              ),
 *         ),
 *     )
 * )
 */