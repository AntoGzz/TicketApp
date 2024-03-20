<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Modules\Events\Models\Buyer;
use Modules\Events\Models\Ticket;
use Modules\Events\App\Models\Event;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Importar el trait HasFactory

class TicketPostTest extends TestCase
{
    use RefreshDatabase; // Utiliza la migración de la base de datos para cada prueba
    use WithFaker; // Si necesitas utilizar el faker para generar datos aleatorios


    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testEventCreation()
    // No culminado por falta de tiempo
    {
/*         // Crear un evento de ejemplo en la base de datos
        $event = [
            'id' => 1,
            'date' => Carbon::now(),
            'name' => 'Concierto de Karol G',
            'quantity' => 1550,
            'quantity_available' => 1550,
            'quantity_sold' => 0,
            'description' => 'Concierto en Vivo de Karol G',
            'user_created_id' => 1,
            'created_at' => Carbon::now(),
        ];

        // Crear datos de prueba para la solicitud
        $requestData = [
            'event_id' => 1,
            'name' => 'John',
            'last_name' => 'Doe',
            'identification' => 'V-23456789',
            'phone' => '(0424)-5555555',
            'email' => 'john@example.com',
            'quantity_sold' => 2,
            'payment_file' => UploadedFile::fake()->image('payment_file.jpg') // Archivo de pago simulado
            // Agrega otros datos de prueba según sea necesario
        ];

        // Ejecutar la solicitud a través de la ruta correspondiente
        $response = $this->post(route('events.newEvent'), $requestData);

        // Verificar que la respuesta sea exitosa
        $response->assertSuccessful();

        // Verificar que el evento, comprador y boleto se hayan creado en la base de datos
        $this->assertDatabaseHas('events', ['id' => 1]); // Verifica la existencia del evento
        $this->assertDatabaseHas('buyers', ['identification' => 'V-23456789']); // Verifica los datos del comprador
        $this->assertDatabaseHas('tickets', ['quantity_sold' => 2]); // Verifica los datos del boleto

        // También puedes realizar otras verificaciones según sea necesario

        // Verifica que el estado de la respuesta JSON sea 200 y que el mensaje sea correcto
        $response->assertJson([
            'state' => 200,
            'msg' => '¡Los Datos se han guardados exitosamente!'
        ]); */
    }
}
