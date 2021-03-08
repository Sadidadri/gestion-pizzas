<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\TestMailController;
use Illuminate\Support\Facades\Mail;
Use App\Models\Rel_Pe_Piz;
Use App\Models\Rel_Pi_Ing;
use App\Http\Controllers\RelPePizController;

class MailTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        //$abc = RelPePizController::sendMail(["2x Pizza Margarita - 9.00€","3x Pizza Barbacoa - 12€", "4x Pizza Cuatro Quesos - 20.00€"],"41.00€","rollpizzas.adri@gmail.com");
        //$response = $this->get('/');
        //$response->assertStatus(200);
    }
}
