<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Chuyendonvi extends Model
{
    use HasFactory;
    protected $table='chuyendonvis';
    protected $fillable=['hesonhan','tudonvi','dendonvi'];
    public function chuyendonvithanh($a,$i,$j){
        $table=$this->table;
        $data=DB::select('SELECT hesonhan FROM '.$table.' WHERE tudonvi='.$i.' AND dendonvi='.$j);
        $hesonhan=$data[0]->hesonhan;
        $ketqua=$a*$hesonhan;
       return $ketqua;
    }
}
