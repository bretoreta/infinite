<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Message::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'chat_room_id' => 1,
            'user_id' => 2,
            'receiver_id' => 1,
            'content' => $this->faker->sentence(10),
            'read_at' => null,
        ];
    }
}
