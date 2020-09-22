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
        $header = [ 'HTTP_Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIzIiwianRpIjoiMTc5M2NjMWFiN2RiYTkxNWRkM2IzZThlYjJlNjA0MGQ1OGY0MzZkYzNlYmY0YWZhMjQ2MmQ1NDU0NGMxZmVlMzVmMGQwOTY2YTlhZjZjYTMiLCJpYXQiOjE2MDA3OTgwNDAsIm5iZiI6MTYwMDc5ODA0MCwiZXhwIjoxNjMyMzM0MDQwLCJzdWIiOiIxMSIsInNjb3BlcyI6W119.TmzOveZQZ2MQ8V2RxqSaAVilEp5ykmG-rW5X_zNVmeAOi8snxtOAiBsZJJxZUweezAGsfxc-GxuAT1QwUWxmDsRGs1DE_UMXvU1XRpqDEzyRcpd_Sf8PaYgDHcX9pe3Ek-TOu7c2KYE3bax0i9XkGItTcWXJMz_959BYh06pGTX6cWgpCLzUtyKzfUvVKfwMHl2fFlL7Y-RJGBx4YFcaYJLCm5x8IEUVmbBTFyIwH5eAInum0HXCAgYdJAT1fs0N6Sdvx2A5IzY_LVzK7yfI7O4ZCDO3LuWooSa2od7zA3oF7YXtmvAw3QU49s8yauiAzTr9nHu28SozK5t10k0-bKdHF0HPrgRdvVTFrVXiBdXvz3aEfZMuUU6AEX-rPUcmWuE57ijHhnR9furHn72Yrc1e4yfKrsBhpSiDR-MSkbzDDnpmRzqidcpZ1F4-DqbZACgVTMUE0EhGdDOsBWOUVKCE_1_M4o7paL-hBmfOqvkjurm7StkRDJWhVzKPzeDlCG6JOeKit0QSOv8-YKh_AbCd87ABwGy8ixCTTgg9bppP4BGLajVTZI8mGtKmMGmFHxduaL3W-A8HDKJZp5ULLHZuqj2Eaj3_6LBK-PsooK9wlTuDywUDTPSM-mFTuBez-g0fmaU88kfpk8j_yqibf3OiU2HQP6ILMuL-PLy75lY'];

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

}


