<?php

namespace App\Http\Services;

use App\Models\User;

class ParentService
{
    public function getParentByNameOrId($username)
    {
        return User::where('name','=',$username)->orWhere('parent_id','=',$username)->firstOrFail();
    }

    public function addPartener($partener_id)
    {
        return auth()->user()->update(['partener_id'=>$partener_id]);
    }
}
