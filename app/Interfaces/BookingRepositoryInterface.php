<?php

namespace App\Interfaces;

interface BookingRepositoryInterface 
{
    public function getAllBookings();
    public function getBookingByResourceId($resource_id);
    public function deleteBooking($bookingId);
    public function createBooking(array $bookingDetails);
}