<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    use HasFactory;
    protected $table = "cases";
    protected $fillable = ['user_id','section_id','email','phone','case_name','jurisdiction','parish','case_number','	client_first_name','client_last_name','client_address','company','note'];
    
    public function Casesections(){
        return $this->hasOne(Casesections::class, 'id', 'section_id');
    }
}
