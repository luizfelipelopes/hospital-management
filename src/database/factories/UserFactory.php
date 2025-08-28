<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

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
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'type'  => collect(['admin', 'doctor', 'receptionist'])->random(),
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (User $user) {
            
            $role = Role::where('name', $user->type)
                       ->where('guard_name', 'sanctum')
                       ->first();
            
            if ($role) {
                $user->assignRole($role);
                $permissions = [];

                switch ($user->type) {
                    case 'admin':
                        $permissions = [
                        'view appointments',
                            'create appointments',
                            'update appointments',
                            'cancel appointments',
                            'view patients',
                            'create patients',
                            'update patients',
                            'delete patients',
                            'view doctors',
                            'create doctors',
                            'update doctors',
                            'delete doctors'
                        ];
                    break;
                    case 'receptionist':
                        $permissions = [
                            'create patients',
                            'update patients',
                            'delete patients',
                            'view appointments',
                            'create appointments',
                            'update appointments',
                            'cancel appointments',
                        ];
                    break;    
                    case 'doctor':
                        $permissions = [
                            'view appointments',
                        ];
                    break;    
                
                    default:
                    break;
                }

                $role->givePermissionTo($permissions);

        }
        });
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

    /**
     * Indicate that the user is a doctor.
     */
    public function doctor(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'doctor',
        ]);
    }
}
