<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateUpdateFile extends Model
{
    use HasFactory;
    protected $table = "template_updated_file";
    protected $fillable = ['case_id','template_id','updated_file','is_remove'];
}
