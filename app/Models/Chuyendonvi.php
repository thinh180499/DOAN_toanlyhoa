<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Chuyendonvi extends Model
{
    use HasFactory;
    protected $table='chuyendonvi';
    protected $fillable=['hesonhan','tudonvi_id','dendonvi_id'];
    public function chuyendonvithanh($a,$i,$j){
        $table=$this->table;
        $data=DB::select('SELECT hesonhan FROM '.$table.' WHERE tudonvi_id='.$i.' AND dendonvi_id='.$j);
        $hesonhan=$data[0]->hesonhan;
        $ketqua=$a*$hesonhan;
       return $ketqua;
    }
}
