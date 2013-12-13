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

    public function testIndexReturnsCorrectViewWithTwits()
    {
        $response = $this->action('GET', 'TwitsController@index');

        $this->assertEquals($response->getContent(), View::make('twits.index'));

        $this->assertViewHas('twits');
    }

}