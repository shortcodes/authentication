<?php


/**
 * @OA\Schema(
 *     description="User model",
 *     title="User",
 * )
 */

class User
{

    /**
     * @OA\Property(
     *     description="Email",
     *     title="email",
     *     example="jonh.doe@mindz.example.pl",
     * )
     *
     * @var string
     */

    private $email;

    /**
     * @OA\Property(
     *     description="Password",
     *     title="password",
     * )
     *
     * @var string
     */

    private $password;

    /**
     * @OA\Property(
     *     description="Name",
     *     title="name",
     *     example="John Doe",
     * )
     *
     * @var string
     */
    private $name;


}