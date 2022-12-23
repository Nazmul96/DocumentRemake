<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentQueue extends Model
{
    use HasFactory;
    protected $table = "document_queue";
    protected $fillable = ['id','document_id','section_id','template_id','document_name','status','is_remove'];

    public function template(){
        return $this->hasOne(Template::class,'id','template_id');
    }

    // public function getAgeGroup(){
    //     return $this->belongsTo(AgeGroup::class, 'ageGroup_id', 'id');
    // }
}