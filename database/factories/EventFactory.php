<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Events\App\Models\Event;

class EventFactory extends Factory
{
    /**
     * Define el modelo de fábrica asociado.
     *
     * @return string
     */
    protected $model = Event::class;

    /**
     * Define el estado predeterminado del modelo de fábrica.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->id,
            'date' => $this->faker->date,
            'name' => $this->faker->name,
            'quantity' => $this->faker->quantity,
            'quantity_available' => $this->faker->quantity_available,
            'quantity_sold' => $this->faker->quantity_sold,
            'ticket_price' => $this->faker->ticket_price,
            'description' => $this->faker->description,
            'user_created_id' => $this->faker->user_created_id,
            'created_at' => $this->faker->created_at,
        ];
    }
}
