<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlovalSetting extends Model
{
    use HasFactory;
    protected $table = "gloval_settings";
    protected $fillable = ['id','name','value','type'];

    // public function getStream(){
    //     return $this->belongsTo(Stream::class, 'stream_id', 'id');
    // }

    // public function getAgeGroup(){
    //     return $this->belongsTo(AgeGroup::class, 'ageGroup_id', 'id');
    // }
}