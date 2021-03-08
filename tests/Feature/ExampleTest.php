<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Pizza;
use App\Http\Controllers\PizzaController;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $pizzas = Pizza::all();

        foreach ($pizzas as $pizza) {
            $ingredientes = PizzaController::getIngredientes($pizza);
            $pizzas["ingredientes"] = $ingredientes;
        }

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
