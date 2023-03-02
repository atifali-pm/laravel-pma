<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_all_projects()
    {
        $this->withoutExceptionHandling();
        $response = $this->getJson('api/v1/projects');

        $this->assertGreaterThan(0, $this->count($response->json()));
    }
}
