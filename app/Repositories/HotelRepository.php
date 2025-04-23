<?php

namespace App\Repositories;

use App\Interfaces\HotelRepositoryInterface;
use App\Models\Hotel;
use App\Repositories\BaseRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class HotelRepository extends BaseRepository implements HotelRepositoryInterface
{


    public function model()
    {
        return Hotel::class;
    }

    public function getAll()
    {
        return $this->model->with('rooms')->get();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function updateRoom($id , array $data){

    }


}
