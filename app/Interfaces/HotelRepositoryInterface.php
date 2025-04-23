<?php

namespace App\Interfaces;

interface HotelRepositoryInterface
{
    public function getAll();
    public function create(Array $data);
    public function update($id, Array $data);
    public function delete($id);
    // public function addRoomsAccommodation(Array $data);
}
