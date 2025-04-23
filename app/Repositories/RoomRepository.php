<?php

namespace App\Repositories;


use App\Interfaces\RoomRepositoryInterface;
use App\Models\Hotel;
use App\Models\HotelRoomsAccommodation;
use App\Repositories\BaseRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class RoomRepository extends BaseRepository implements RoomRepositoryInterface
{

    private const ACCOMMODATION_BY_TYPE  = [
        'ESTANDAR' => [
            'SENCILLA',
            'DOBLE',
        ],
        'JUNIOR' => [
            'TRIPLE',
            'CUADRUPLE',
        ],
        'SUITE' => [
            'SENCILLA',
            'DOBLE',
            'TRIPLE',
        ],
    ];

    public function model()
    {
        return HotelRoomsAccommodation::class;
    }

    public function create(array $data)
    {
        try{
        DB::beginTransaction();
        $hotel = Hotel::find($data['hotel_id']);
        $this->validateRoomsAccommodationByType($data['room_type'], $data['accommodation']);
        $this->validateRoomsAccommodationByTotalRooms($data['total_rooms'], $hotel);
        return $this->model->create($data);
        DB::commit();
        return 'Accommodation added successfully';
    } catch (Exception $e) {
        DB::rollBack();
        return $e->getMessage();
    }
    }

    public function update($id, array $data)
    {
        try{
        DB::beginTransaction();
        $hotel = Hotel::find($data['hotel_id']);
        $this->validateRoomsAccommodationByType($data['room_type'], $data['accommodation']);
        $this->validateRoomsAccommodationByTotalRooms($data['total_rooms'], $hotel, $id);
        $this->model->find($id)->update($data);
        DB::commit();
        return 'Accommodation updated successfully';
        }
        catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }


    private function validateRoomsAccommodationByTotalRooms($total_room, Hotel $hotel, $id = null)
    {
        $total_room_updated = $this->model->find($id)->total_rooms ?? 0;
        $totalRoomsHotel = $hotel->total_rooms;
        $totalRoomsHotelRegisteredAccommodation = $hotel->rooms->sum('total_rooms');

        if (($totalRoomsHotelRegisteredAccommodation - $total_room_updated + $total_room  > $totalRoomsHotel))
            throw new Exception('Total rooms exceed the limit');
    }

    private function validateRoomsAccommodationByType($type, $accommodation)
    {
        if (!in_array($accommodation, self::ACCOMMODATION_BY_TYPE[$type]))
            throw new Exception('Accommodation not valid');
    }
}
