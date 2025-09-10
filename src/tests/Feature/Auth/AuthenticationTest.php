<?php

use App\Models\User;

use function Pest\Laravel\post;

test('users can authenticate using the login screen', function () {
    $user = User::factory()->create();

    $response = post(route('login', [
        'email' => $user->email,
        'password' => 'password',
    ]));

    $this->assertAuthenticated();
    $response->assertRedirect();
});

test('users can not authenticate with invalid password', function () {
    $user = User::factory()->create();

    $this->post('/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
});

test('users can logout', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/logout');

    $this->assertGuest();
    $response->assertRedirect();
});
