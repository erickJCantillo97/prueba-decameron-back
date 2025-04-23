<?php

namespace App\Http\Controllers;

use App\Interfaces\RoomRepositoryInterface;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function __construct(
        private RoomRepositoryInterface $roomRepository,
    )
    {

    }

    public function store(Request $request)
    {
        $data = $request->all();
        $message = $this->roomRepository->create($data);
        if ($message !== 'Accommodation added successfully') {
        return response()->json(['message' => $message, 'state' => false], 400); // Bad Reques
        }
        return response()->json(['message' => $message, 'state' => true], 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->roomRepository->update($id, $data);
        return response()->json(['message' => 'Room updated successfully'], 200);
    }
    public function destroy($id)
    {
        $this->roomRepository->delete($id);
        return response()->json(['message' => 'Room deleted successfully'], 200);
    }
}
