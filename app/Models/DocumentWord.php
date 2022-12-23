<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentWord extends Model
{
    use HasFactory;
    protected $table = "document_words";
    protected $fillable = ['id','name','value','type','document_id'];

}