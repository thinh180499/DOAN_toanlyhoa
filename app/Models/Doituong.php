<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Doituong extends Model
{
    use HasFactory;
    protected $table='doituong';
    protected $fillable=['loaidoituong_id'];
    public function doituong(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table);
    }
    public function themdoituong($data){
        DB::insert('INSERT INTO '.$this->table.'('.$this->fillable.')value(?)',$data);
     }
}
