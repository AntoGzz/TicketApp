<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventPostTest extends TestCase
{
    use RefreshDatabase; // Utiliza la migración de la base de datos para cada prueba

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testEventCreation()
    {
        // Datos de ejemplo para el evento
        $eventData = [
            'id' => 1,
            'date' => Carbon::now(),
            'name' => 'Concierto de Karol G',
            'quantity' => 1550,
            'quantity_available' => 1550,
            'quantity_sold' => 0,
            // TODO:: Solventar
            // 'ticket_price' => '12.00',
            'description' => 'Concierto en Vivo de Karol G',
            'user_created_id' => 1,
            'created_at' => Carbon::now(),
        ];

        // Envía una solicitud POST al endpoint del controlador para crear un evento
        $response = $this->post(route('events.newEvent'), $eventData);

        // Verifica que la respuesta tenga un código de estado exitoso (200)
        $response->assertStatus(200);

        // Verifica que el evento se haya creado en la base de datos
        $this->assertDatabaseHas('events', $eventData);
    }
}
