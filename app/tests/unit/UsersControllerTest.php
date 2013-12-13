<?php

class UsersControllerTest extends TestCase {

    /**
     * Confirm route response.
     *
     * @return void
     */
    public function testRouteResponse()
    {
        $crawler = $this->client->request('GET', '/users');

        $this->assertTrue($this->client->getResponse()->isOk());
    }

    public function testIndexReturnsCorrectViewWithUsers()
    {
        $response = $this->action('GET', 'UsersController@index');

        $this->assertEquals($response->getContent(), View::make('users.index'));

        $this->assertViewHas('users');
    }

}