<?php


class AuthenticationTest extends TestCase 
{

    /**
     * Register [POST]
     */

    public function testNewUserRegistration ()
    {
        $params = [
            'name' => 'example',
            'email' => 'example@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];
        $this->post('/api/v1/register', $params);
        $this->seeStatusCode(201);
        $this->seeJsonStructure([
            'data' =>
                [
                    'status',
                    'message',
                    'token',
                    'token_type',
                ]
        ]);
    }


    /**
     * Login [POST]
     */

    public function testUserLogin ()
    {
        $params = [
            'email' => 'example@gmail.com',
            'password' => 'password',
        ];
        $this->post('/api/v1/login', $params);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' => 
                [
                    'status',
                    'token',
                    'token_type',
                ]
        ]);
    }


    /**
     * Get user Data [GET]
     */

    public function testGetUserData ()
    {
        $header = [ 'HTTP_Authorization' => 'Bearer API-Token'];

        $this->get('/api/v1/user/data', $header);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'user' => 
                [
                    'name',
                    'email',
                    'last_logged_in',
                    'created_at',
                    'updated_at',
                ]
        ]);
    }




     /**
     * Get user Data [GET]
     */

    public function testLogUserOut ()
    {
        $header = [ 'HTTP_Authorization' => 'Bearer API-Token'];

        $this->post('/api/v1/logout', [], $header);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' => 
                [
                    'message',
                    'status',
                ]
        ]);
    }
}


