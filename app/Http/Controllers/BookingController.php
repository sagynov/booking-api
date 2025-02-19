<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Http\Resources\Booking;
use App\Models\Booking as BookingModel;
use App\Interfaces\BookingRepositoryInterface;

class BookingController extends Controller
{
    private BookingRepositoryInterface $bookingRepository;

    public function __construct(BookingRepositoryInterface $bookingRepository) 
    {
        $this->bookingRepository = $bookingRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        return response()->json([
            'data' => $this->bookingRepository->getBookingByResourceId($id)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $bookingDetails = $request->only([
            'resource_id',
            'user_id',
            'start_time',
            'end_time',
        ]);
        return response()->json(
            [
                'data' => $this->bookingRepository->createBooking($bookingDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->bookingRepository->deleteBooking($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
