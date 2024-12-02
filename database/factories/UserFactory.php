<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name(),
            'username' => $this->faker->unique()->userName(),
            'phone' => $this->faker->unique()->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'), // Mật khẩu mặc định
            'id_wallet' => $this->faker->unique()->uuid(), // Tạo UUID làm id_wallet
            'status' => $this->faker->randomElement(['active', 'inactive', 'banned']),
            'zalo' => $this->faker->userName(),
            'facebook' => $this->faker->url(),
            'image' => $this->faker->imageUrl(200, 200, 'people'), // URL ảnh giả
            'remember_token' => strtoupper(bin2hex(random_bytes(18))), // Tạo token dạng 36 ký tự
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
