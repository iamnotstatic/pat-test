<?php


class AuthenticationTest extends TestCase 
{

    /**
     * Register [POST]
     */

    public function testNewUserRegistration ()
    {
        $params = [
            'name' => 'test',
            'email' => 'test@gmail.com',
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
            'email' => 'test@gmail.com',
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
        $header = [ 'HTTP_Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNWQyZTIzNzMxMWZhYzVjYmMyMDE0MTI4ZmMyY2E5YzljYzQyZDhlM2YxOTFiNzQ2M2Q3OWRkYzE0NzFjYjk5NDczMGMxY2U0YjZlMjEwY2UiLCJpYXQiOjE2MDA4NjExNDQsIm5iZiI6MTYwMDg2MTE0NCwiZXhwIjoxNjMyMzk3MTQ0LCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.XE--skAcCFnOIEQBOBNLNvd6zOdpxkYWARHaEGOLSNLK34E00tXV_n3pGqA5gzPOnaKxwZ0-R9BwTWGHX4jWrw2vtAvnbgeypdUp0vAEhWIb_tfoTngVU9ct7BwYnbTre1NZNRyv5Fvve7mGOK4AAB5Et6TWG3W4f994E01krGpIkakEN87Z7lyhT3Ngjdn8hRRVqa2Ummqmn0CEOvvOYXJX4SafFC2dfhNq-Uh_hVdgggqNAH_5FgCbE5R4jnzQ7V4ZOa5Bv_J9J2TWdFGAmW4EUUElRF9PaLcFce6JPb7tzkXdy5GjDWmQGNq_5Yb9zpakr9kofpQWLB16BdYNZ6uay2mcGO7VHNVrYI6GV3xmTB6b3Tlpl9k4mrOrTqFqf4jSYQjcfBEDfTcGr4T9wAoSmFhiYLwsMUBLJP7rpRIJChfW6cU4ANovgWCFmrPMxNxRKe-tM784g8BV-NaMuRTkrMbJg9dXJApvItsZ8KQEKV4cNg9wXuiNFkOSUl7aASuIC_eFWdmTxhj5DDZBG7z1u21L1xG1kIklf8JDvP9txCEe77cFGYzcKx2PF4Lpiopr98kzBPkLsU5b95QdCilz6wqB9p8pNLsUgOhcanwd9QVo24juQ7D2sJqilWaIsGn3R9CeslQg7LcN_4pccBdKNsPPk2SaGfCAj38U3QE'];

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
        $header = [ 'HTTP_Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNWQyZTIzNzMxMWZhYzVjYmMyMDE0MTI4ZmMyY2E5YzljYzQyZDhlM2YxOTFiNzQ2M2Q3OWRkYzE0NzFjYjk5NDczMGMxY2U0YjZlMjEwY2UiLCJpYXQiOjE2MDA4NjExNDQsIm5iZiI6MTYwMDg2MTE0NCwiZXhwIjoxNjMyMzk3MTQ0LCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.XE--skAcCFnOIEQBOBNLNvd6zOdpxkYWARHaEGOLSNLK34E00tXV_n3pGqA5gzPOnaKxwZ0-R9BwTWGHX4jWrw2vtAvnbgeypdUp0vAEhWIb_tfoTngVU9ct7BwYnbTre1NZNRyv5Fvve7mGOK4AAB5Et6TWG3W4f994E01krGpIkakEN87Z7lyhT3Ngjdn8hRRVqa2Ummqmn0CEOvvOYXJX4SafFC2dfhNq-Uh_hVdgggqNAH_5FgCbE5R4jnzQ7V4ZOa5Bv_J9J2TWdFGAmW4EUUElRF9PaLcFce6JPb7tzkXdy5GjDWmQGNq_5Yb9zpakr9kofpQWLB16BdYNZ6uay2mcGO7VHNVrYI6GV3xmTB6b3Tlpl9k4mrOrTqFqf4jSYQjcfBEDfTcGr4T9wAoSmFhiYLwsMUBLJP7rpRIJChfW6cU4ANovgWCFmrPMxNxRKe-tM784g8BV-NaMuRTkrMbJg9dXJApvItsZ8KQEKV4cNg9wXuiNFkOSUl7aASuIC_eFWdmTxhj5DDZBG7z1u21L1xG1kIklf8JDvP9txCEe77cFGYzcKx2PF4Lpiopr98kzBPkLsU5b95QdCilz6wqB9p8pNLsUgOhcanwd9QVo24juQ7D2sJqilWaIsGn3R9CeslQg7LcN_4pccBdKNsPPk2SaGfCAj38U3QE'];

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


