<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentValue extends Model
{
    use HasFactory;
    protected $table = 'document_value';
    protected $guarded = [];

    public function documentField()
    {
        return $this->belongsTo('App\Models\DocumentField', 'document_field_id', 'id');
    }

    public function field()
    {
        return $this->belongsTo('App\Models\Field', 'field_id', 'id');
    }
}
