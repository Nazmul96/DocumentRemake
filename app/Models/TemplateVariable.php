<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateVariable extends Model
{
    use HasFactory;
    protected $table="template_variable";
    protected $fillable=['section_id','description','variable'];

    public function CaseValue(){
        return $this->belongsTo(CaseValue::class,'id','variable_id');
    }
}
