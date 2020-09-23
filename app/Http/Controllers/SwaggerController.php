<?php

namespace App\Http\Controllers;

class SwaggerController extends Controller
{
    /**
     * @OA\Info(
     *   title="API Documentation",
     *   version="1.0",
     *   @OA\Contact(
     *     email="abdulfataisuleiman67@gmail.com",
     *     name="Abdulfatai Suleiman"
     *   )
     * )
     */

     /**
* 
*   @OA\SecurityScheme(
*     type="http",
*     description="Laravel passport oauth2 security.",
*     name="Password Based",
*     in="header",
*     scheme="bearer",
*     securityScheme="bearerAuth",
*     
*     @OA\Flow(
*         flow="password",
*         authorizationUrl="/oauth/authorize",
*         tokenUrl="/oauth/token",
*         refreshUrl="/oauth/token/refresh",
*         scopes={}
*     )
* )
*/


/** 
* 
* 
* @OA\Tag(
*     name="Authentication",
*     description="Operations about Authentication",
*     @OA\ExternalDocumentation(
*         description="Find out more about",
*         url="http://swagger.io"
*     )
* )
*/


     
/** 
* @OA\Post(
*      path="/api/v1/register",
*      tags={"Authentication"},
*      summary="Register a user",
*      description="Adds a new user",
*      operationId="registerUser",
* 
*   @OA\RequestBody(
*       required=true,
*       @OA\MediaType(
*           mediaType="multipart/form-data",
*           @OA\Schema(
* 
*               @OA\Property(
*                   property="name",
*                   description="User name",
*                   type="string"
*               ),
*               @OA\Property(
*                   property="email",
*                   description="User email address",
*                   type="string"
*               ),
* 
*               @OA\Property(
*                   property="password",
*                   description="User password",
*                   type="string"
*               ),
* 
*               @OA\Property(
*                   property="password_confirmation",
*                   description="User password confirmation",
*                   type="string"
*               ),
*    
*           )
*       )
*   ),
*
*
*      @OA\Response(
*          response=201,
*          description="user created successfully"
*       ),
*       @OA\Response(response=400, description="Bad request"),
*       security={
*           {"api_key_security_example": {}}
*       }
*     )
* 
*
*/




/**
* @OA\Post(
*      path="/api/v1/login",
*      tags={"Authentication"},
*      summary="Login a user",
*      description="Login user",
*      operationId="loginUser",
* 
*   @OA\RequestBody(
*       required=true,
*       @OA\MediaType(
*           mediaType="multipart/form-data",
*           @OA\Schema(
*               @OA\Property(
*                   property="email",
*                   description="User email",
*                   type="string"
*               ),
* 
*               @OA\Property(
*                   property="password",
*                   description="User password",
*                   type="string"
*               ),
*           )
*       )
*   ),
* 
*      @OA\Response(
*          response=200,
*          description="successful operation"
*       ),
*       @OA\Response(response=401, description="Invalid Credentails"),
*       security={
*           {"api_key_security_example": {}}
*       }
*     )
* 
* 
*/


/**
* @OA\Get(
*      path="/api/v1/user/data",
*      operationId="getUser",
*      tags={"Authentication"},
*      summary="Get authenticated user Detail",
*      description="Returns authenticated user Detail, Not you need to be            authenticated to perform this action",
*    
*      @OA\Response(
*          response=200,
*          description="successful operation"
*       ),
*       @OA\Response(response=401, description="Unauthenticated"),
*       security={
*         {"bearerAuth": {}}
*       }
*   )
*
*/


/** 
* @OA\Post(
*      path="/api/v1/logout",
*      operationId="logout",
*      tags={"Authentication"},
*      summary="Logout user revoke token",
*      description="Logout user revoke token, Not you need to be            authenticated to perform this action",
*    
*      @OA\Response(
*          response=200,
*          description="successful operation"
*       ),
*       @OA\Response(response=401, description="Unauthenticated"),
*       security={
*         {"bearerAuth": {}}
*       }
*     )
*
* 
*/
     
     
}
