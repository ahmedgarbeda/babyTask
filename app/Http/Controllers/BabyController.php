<?php

namespace App\Http\Controllers;

use App\Http\Requests\BabyRequest;
use App\Http\Resources\BabyResource;
use App\Http\Services\BabyService;
use Illuminate\Http\Request;

class BabyController extends Controller
{

    public function __construct(BabyService $babyService)
    {
        $this->babyService = $babyService;
    }

    public function getAllBabies()
    {
        $babies = $this->babyService->getAllBabies();
        return \response()->json(['data' => BabyResource::collection($babies)]);
    }

    public function getMyBabies()
    {
        $babies = $this->babyService->getMyBabies();
        return \response()->json(['data' => BabyResource::collection($babies)]);
    }

    public function addBaby(BabyRequest $babyRequest)
    {
        $name = $babyRequest->get('name');
        $this->babyService->addBaby($name);
        return response()->json(['message' => 'the baby has been added successfully']);
    }

    public function editBaby(BabyRequest $babyRequest, $baby_id)
    {
        $data = $babyRequest->only('name');
        $this->babyService->updateBaby($baby_id, $data);
        return response()->json(['message' => 'the baby has been updated successfully']);
    }

    public function getOneBaby($baby_id)
    {
        $baby = $this->babyService->getOneBaby($baby_id);
        return response()->json(['data' => BabyResource::make($baby)]);
    }

    public function delete($id)
    {
        $this->babyService->delete($id);
        return response()->json(['message' => 'the baby has been deleted']);
    }
}
