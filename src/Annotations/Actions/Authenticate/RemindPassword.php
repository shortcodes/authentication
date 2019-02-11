<?php


/**
 * @OA\Post(
 *     path="/remind-password",
 *     summary="Sends an email with instructions to reset password",
 *     tags={"authenticate"},
 *     operationId="userRemindPassword",
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
 *                  property="email",
 *                  example="r.szymanski@mindz.it",
 *                  type="string",
 *              ),
 *         )
 *     )
 * )
 */