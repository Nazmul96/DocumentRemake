<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;
    protected $table="templates";
    protected $fillable=['section_id','description','update_file','extension_type'];

    public function getSection(){
        return $this->belongsTo(Casesections::class,'section_id','id');
    }
}
