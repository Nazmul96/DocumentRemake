<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseValue extends Model
{
    use HasFactory;
    protected $table = "case_values";
    protected $fillable = ['id','variable_id','case_id','case_value','variable_name'];
    
    // public function Casesections(){
    //     return $this->hasOne(Casesections::class, 'id', 'section_id');
    // }
}
