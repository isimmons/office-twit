<?php

class TwitsControllerTest extends TestCase {

    /**
     * Confirm route response.
     *
     * @return void
     */
    public function testRouteResponse()
    {
        $crawler = $this->client->request('GET', '/twits');

        $this->assertTrue($this->client->getResponse()->isOk());
    }

}