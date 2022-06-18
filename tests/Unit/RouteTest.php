<?php

namespace Tests\Unit;

use Tests\TestCase;

class RouteTest extends TestCase
{


    /**
     * This test will check if the home route exists
     * @return void
     */
    public function test_to_see_if_the_home_route_tests()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


}
