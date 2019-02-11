<?php


/**
 * @OA\Post(
 *     path="/reset-password",
 *     summary="Sets new password for user",
 *     tags={"authenticate"},
 *     operationId="userResetPassword",
 *
 *     @OA\Response(
 *         response=204,
 *         description="No Content",
 *         @OA\MediaType( mediaType="application/json")
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Unprocessable Entity",
 *         @OA\MediaType( mediaType="application/json")
 *     ),
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *              @OA\Property(
 *                  property="token",
 *                  type="string",
 *              ),
 *              @OA\Property(
 *                  property="password",
 *                  example="",
 *                  type="string",
 *              ),
 *         )
 *     )
 * )
 */