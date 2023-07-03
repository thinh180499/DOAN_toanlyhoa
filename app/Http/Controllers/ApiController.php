<?php

namespace App\Http\Controllers;
use App\Models\Congthuc;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    private $congthuc;
    public function __construct(){
        $this->congthuc=new Congthuc();
    }
    public function congthuc($id)
    {
    $list_congthuc=$this->congthuc->chitietcongthuc($id);
    return $list_congthuc;
    }
}
