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

}