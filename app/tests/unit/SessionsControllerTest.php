<?php

class SessionsControllerTest extends TestCase {

    /**
     * Confirm route response.
     *
     * @return void
     */
    public function testRouteResponse()
    {
        $crawler = $this->client->request('GET', '/login');

        $this->assertTrue($this->client->getResponse()->isOk());
    }

    /**
     * Make sure the create method returns the login view
     *
     * @return void
     **/
    public function testCreateMethodReturnsCorrectView()
    {
        $response = $this->action('GET', 'SessionsController@create');
        
        $this->assertEquals($response->getContent(), View::make('sessions.create'));
    }

    /**
    * Test the  store method creates a session
    *
    * @return void
    **/
    public function testStoreMethodCreatesSession()
    {
        Auth::logout();

        $response = $this->action('POST', 'SessionsController@store', ['username' => 'john', 'password' => '1234']);
    
        $this->assertTrue(Auth::check());
    }

    public function testDestroyMethodDestroysTheSessionAndRedirectsToLogin()
    {
        $user = User::find(1);
        Auth::login($user);

        $response = $this->action('GET', 'SessionsController@destroy');

        $this->assertFalse(Auth::check());

        $this->assertRedirectedTo('login');
    }   

}