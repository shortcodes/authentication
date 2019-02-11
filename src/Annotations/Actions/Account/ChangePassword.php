<?php


/**
 * @OA\Post(
 *     path="/account/change-password",
 *     summary="Change user's password",
 *     tags={"account"},
 *     operationId="userChangePassword",
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
 *                  property="old_password",
 *                  example="",
 *                  type="string",
 *              ),
 *              @OA\Property(
 *                  property="new_password",
 *                  example="",
 *                  type="string",
 *              ),
 *         )
 *     ),
 *      security={
 *         {"apiKey": {}}
 *     }
 * )
 */