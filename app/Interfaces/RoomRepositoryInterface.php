<?php

namespace App\Interfaces;

interface RoomRepositoryInterface
{

    public function create(Array $data);
    public function update($id, Array $data);
    public function delete($id);
    // public function addRoomsAccommodation(Array $data);
}
