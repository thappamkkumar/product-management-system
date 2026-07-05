<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;

uses(RefreshDatabase::class);

/*
beforeEach(function () {
    $this->withoutMiddleware(ValidateCsrfToken::class);
});
*/

it('admin can create a product', function () {

    $admin = User::factory()->admin()->create();

    $this->actingAs($admin);

    $response = $this->post(route('products.store'), [
        'title' => 'iPhone 16',
        'description' => 'Latest Apple Phone',
        'price' => 99999,
        'date_available' => now()->format('Y-m-d'),
    ]);

    $response->assertRedirect(route('products.index'));

    $this->assertDatabaseHas('products', [
        'title' => 'iPhone 16',
    ]);
});

it('normal user cannot create product', function () {

    $user = User::factory()->user()->create();

    $this->actingAs($user);

    $this->post(route('products.store'), [
        'title' => 'Laptop',
        'description' => 'Gaming Laptop',
        'price' => 50000,
        'date_available' => now()->format('Y-m-d'),
    ])->assertForbidden();
});

it('guest is redirected to login', function () {

    $this->post(route('products.store'), [
        'title' => 'Laptop',
        'description' => 'Gaming Laptop',
        'price' => 50000,
        'date_available' => now()->format('Y-m-d'),
    ])->assertRedirect(route('login'));
});


it('admin can view product list', function () {

    Product::factory()->count(3)->create();

    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)
        ->get(route('products.index'))
        ->assertOk();
});

it('admin can update a product', function () {

    $admin = User::factory()->admin()->create();

    $product = Product::factory()->create();

    $this->actingAs($admin);

    $response = $this->put(route('products.update', $product), [
        'title' => 'Updated Product',
        'description' => 'Updated Description',
        'price' => 2500,
        'date_available' => now()->format('Y-m-d'),
    ]);

    $response->assertRedirect(route('products.index'));

    $this->assertDatabaseHas('products', [
        'id' => $product->id,
        'title' => 'Updated Product',
    ]);
});

it('admin can delete a product', function () {

    $admin = User::factory()->admin()->create();

    $product = Product::factory()->create();

    $this->actingAs($admin);

    $response = $this->delete(route('products.destroy', $product));

    $response->assertRedirect(route('products.index'));

    $this->assertDatabaseMissing('products', [
        'id' => $product->id,
    ]);
});

it('normal user cannot update a product', function () {

    $user = User::factory()->user()->create();

    $product = Product::factory()->create();

    $this->actingAs($user);

    $this->put(route('products.update', $product), [
        'title' => 'Updated',
        'description' => 'Description',
        'price' => 1000,
        'date_available' => now()->format('Y-m-d'),
    ])->assertForbidden();
});

it('normal user cannot delete a product', function () {

    $user = User::factory()->user()->create();

    $product = Product::factory()->create();

    $this->actingAs($user);

    $this->delete(route('products.destroy', $product))
        ->assertForbidden();
});


it('search returns matching products', function () {

    $admin = User::factory()->admin()->create();

    Product::factory()->create([
        'title' => 'iPhone 16',
    ]);

    Product::factory()->create([
        'title' => 'Samsung Galaxy',
    ]);

    $this->actingAs($admin);

    $response = $this->get(route('products.index', [
        'search' => 'iPhone',
    ]));

    $response
        ->assertOk()
        ->assertSee('iPhone 16')
        ->assertDontSee('Samsung Galaxy');
});

it('title is required when creating product', function () {

    $admin = User::factory()->admin()->create();

    $this->actingAs($admin);

    $response = $this->post(route('products.store'), [
        'title' => '',
        'description' => 'Description',
        'price' => 100,
        'date_available' => now()->format('Y-m-d'),
    ]);

    $response->assertSessionHasErrors('title');
});