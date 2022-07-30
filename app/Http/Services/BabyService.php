<?php

namespace App\Http\Services;

use App\Models\Baby;
use function PHPUnit\Framework\throwException;

class BabyService
{
    public function getAllBabies()
    {
        return Baby::where('parent_id',auth()->id())->orWhere('parent_id',auth()->user()->partener_id)->get();
    }

    public function getMyBabies()
    {
        return Baby::where('parent_id',auth()->id())->get();
    }

    public function addBaby($name)
    {
        try {
            return Baby::create(['name' => $name, 'parent_id'=> auth()->id()]);
        }catch (\Exception $e){
            return throwException($e);
        }
    }

    public function getOneBaby($baby_id)
    {
        return Baby::findOrFail($baby_id);
    }

    public function updateBaby($baby_id,$data)
    {
        try {
            $baby = $this->getOneBaby($baby_id);
            return $baby->update($data);
        }catch (\Exception $e){
            return throwException($e);
        }
    }

    public function delete($baby_id)
    {
        try {
            return Baby::destroy($baby_id);
        }catch (\Exception $e){
            return throwException($e);
        }
    }
}
