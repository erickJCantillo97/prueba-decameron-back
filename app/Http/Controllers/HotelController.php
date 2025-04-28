<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccommodationToRoomRequest;
use App\Models\Hotel;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Interfaces\HotelRepositoryInterface;


class HotelController extends Controller
{

    public function __construct(
        private HotelRepositoryInterface $hotelRepository
    )
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'success',
            'data' => $this->hotelRepository->getAll()
        ], 200);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHotelRequest $request)
    {
        $hotel = $this->hotelRepository->create($request->validated());
        return response()->json([
            'message' =>'success',
            'data' => $hotel
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {
        return response()->json([
           'message' =>'success',
            'data' => $hotel
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHotelRequest $request, Hotel $hotel)
    {
        return response()->json([
            'message' =>'success',
            'data' => $this->hotelRepository->update($hotel->id, $request->validated())
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        return response()->json([
           'message' =>'success',
            'data' => $this->hotelRepository->delete($hotel->id)
        ]);
    }

}
