<?php


/**
 * @OA\Post(
 *     path="/register/{token}",
 *     summary="Confirmation of user registration.",
 *     tags={"authenticate"},
 *     operationId="userLoginConfirmation",
 *
 *     @OA\Parameter(
 *         name="token",
 *         in="path",
 *         description="Token provided by email",
 *         required=true,
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Success",
 *         @OA\MediaType( mediaType="application/json")
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Unprocessable Entity",
 *         @OA\MediaType( mediaType="application/json")
 *     )
 *
 * )
 */
