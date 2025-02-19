<?php
use App\Models\Resource;
use App\Models\User;
use App\Models\Booking;

test('display list of bookings', function () {
    $resource = Resource::factory()->create();
    $response = $this->get('/api/resources/'.$resource->id.'/bookings');
    $response->assertStatus(200);
});
test('create a new booking', function () {
    $resource = Resource::factory()->create();
    $user = User::factory()->create();
    $response = $this->post('/api/bookings', [
        'resource_id' => $resource->id,
        'user_id' => $user->id,
        'start_time' => now(),
        'end_time' => now()->addDays(3),
    ]);
    $response->assertStatus(201);
});
test('delete the booking', function () {
    $resource = Resource::factory()->create();
    $user = User::factory()->create();
    $booking = Booking::factory()->create([
        'resource_id' => $resource->id,
        'user_id' => $user->id,
        'start_time' => now(),
        'end_time' => now()->addDays(3)
    ]);
    $response = $this->delete('/api/bookings/'.$booking->id);
    $response->assertStatus(204);
});
