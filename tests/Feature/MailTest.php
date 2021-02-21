<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\TestMailController;
use Illuminate\Support\Facades\Mail;

class MailTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {

        echo "Holaaaaa";
        Mail::to('porerotote7@gmail.com')->send(new TestMailController());
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
