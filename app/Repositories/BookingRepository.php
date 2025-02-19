<?php

namespace App\Repositories;

use App\Interfaces\BookingRepositoryInterface;
use App\Http\Resources\Booking;
use App\Models\Booking as BookingModel;

class BookingRepository implements BookingRepositoryInterface 
{
    public function getAllBookings() 
    {
        return Booking::collection(BookingModel::all());
    }
    public function getBookingByResourceId($resourceId) 
    {
        return Booking::collection(BookingModel::where('resource_id', $resourceId)->get());
    }
    public function deleteBooking($bookingId) 
    {
        BookingModel::destroy($bookingId);
    }
    public function createBooking(array $bookingDetails) 
    {
        return BookingModel::create($bookingDetails);
    }
}