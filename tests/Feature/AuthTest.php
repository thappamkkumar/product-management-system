<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;

uses(RefreshDatabase::class);


beforeEach(function () {
    $this->withoutMiddleware(ValidateCsrfToken::class);
});


it('shows the login page', function () {
    $this->get(route('login'))
        ->assertOk();
});

it('allows a user to login with valid credentials', function () {
    $user = User::factory()->create([
        'password' => bcrypt('Mukesh;06'),
    ]);

    $this->post(route('login'), [
        'email' => $user->email,
        'password' => 'Mukesh;06',
    ])
        ->assertRedirect(route('dashboard'));

    $this->assertAuthenticated();
});

it('does not login with invalid password', function () {
    $user = User::factory()->create([
        'password' => bcrypt('Mukesh;06'),
    ]);

    $this->post(route('login'), [
        'email' => $user->email,
        'password' => 'Mukesh;07',
    ]);

    $this->assertGuest();
});

it('allows a user to logout', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $this->post(route('logout'))
        ->assertRedirect('/');

    $this->assertGuest();
});