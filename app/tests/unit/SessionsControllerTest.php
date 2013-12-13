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

}