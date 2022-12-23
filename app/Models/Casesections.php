<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casesections extends Model
{
    use HasFactory;
    protected $table = "case_sections";
  //  protected $fillable = ['id','document_name','orginal_document_name','extension_type','user_id','type'];

    // public function getStream(){
    //     return $this->belongsTo(Stream::class, 'stream_id', 'id');
    // }

    // public function getAgeGroup(){
    //     return $this->belongsTo(AgeGroup::class, 'ageGroup_id', 'id');
    // }

    // public function getUser(){
    //     return $this->belongsTo(User::class,'user_id','id');
    // }
    // public function documentQueue(){
    //     return $this->belongsTo(DocumentQueue::class,'id','document_id');
    // }
}