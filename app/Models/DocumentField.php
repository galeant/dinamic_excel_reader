<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentField extends Model
{
    use HasFactory;
    protected $table = 'document_field';
    protected $guarded = [];

    public function document()
    {
        return $this->belongsTo('App\Models\Document', 'document_id', 'id');
    }

    public function field()
    {
        return $this->belongsTo('App\Models\Field', 'field_id', 'id');
    }

    public function value()
    {
        return $this->hasMany('App\Models\DocumentValue', 'document_field_id', 'id')->orderBy('order', 'ASC');
    }
}
