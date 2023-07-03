<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Doituonglakhainiem extends Model
{
    use HasFactory;
    protected $table='doituonglakhainiem';
    protected $fillable=['doituong_id','khainiem_id'];
    public function doituonglakhainiem(){
        $table=$this->table;
        return DB::select('SELECT * FROM '.$table);
    }
    public function themdoituonglakhainiem($data){
        DB::insert('INSERT INTO '.$this->table.'('.$this->fillable.')value(?,?)',$data);
     }
}
