<?php

namespace App\Http\Controllers;
use App\Models\Khainiem;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function Search($tukhoa){
        $khainiem=new Khainiem();
        $data=$khainiem->timkiem($tukhoa);
        
        return $data;
    }
}
