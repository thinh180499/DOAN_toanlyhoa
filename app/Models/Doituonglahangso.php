<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Doituonglahangso extends Model
{
    use HasFactory;
    protected $table='doituonglahangso';
    protected $fillable=['doituong_id'];
    public function doituonglahangso(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table);
    }
    public function themdoituonglahangso($data){
        DB::insert('INSERT INTO '.$this->table.'('.$this->fillable.')value(?)',$data);
     }
}
