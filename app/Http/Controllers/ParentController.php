<?php

namespace App\Http\Controllers;

use App\Http\Services\ParentService;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function addPartener(Request $request, ParentService $parentService)
    {
        $data = $request->validate([
            'username' => 'required',
        ]);

        $partener = $parentService->getParentByNameOrId($data['username']);
        $parentService->addPartener($partener->id);
        return response()->json(['message' => 'partener has been added successfully']);
    }
}
