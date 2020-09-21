<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    use HasFactory;

    protected $table = 'document_type';
    protected $guarded = [];
    public function document()
    {
        return $this->hasOne('App\Models\Document', 'type_id', 'id');
    }

    public function parent()
    {
        return $this->hasOne('App\Models\DocumentType', 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\DocumentType', 'parent_id', 'id');
    }
}
