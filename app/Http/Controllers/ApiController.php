<?php

namespace App\Http\Controllers;
use App\Models\Khainiem;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function Search(){
        $khainiem=new Khainiem();
        $data=$khainiem->timkiem();
        //dd($data);
        return $data;
    }
}
