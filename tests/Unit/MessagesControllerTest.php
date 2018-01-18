<?php

namespace Tests\Feature\unit;

use App\Http\Controllers\MessagesController;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MessagesControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $controller = new MessagesController();
        $controller->index();
    }
}
