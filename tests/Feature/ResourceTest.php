<?php
use App\Models\Resource;

test('display list of resources', function () {
    $response = $this->get('/api/resources');
    $response->assertStatus(200);
});
test('create a new resource', function () {
    $response = $this->post('/api/resources', [
        'name' => fake()->name(),
        'type' => fake()->name(),
        'description' => fake()->name(),
    ]);
    $response->assertStatus(201);
});
