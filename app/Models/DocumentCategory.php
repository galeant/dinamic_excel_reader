<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentCategory extends Model
{
    use HasFactory;

    protected $table = 'document_category';
    protected $guarded = [];

    public function document()
    {
        return $this->hasOne('App\Models\Document', 'category_id', 'id');
    }

    // public function parent()
    // {
    //     return $this->hasOne('App\Models\DocumentCategory', 'parent_id', 'id');
    // }

    // public function children()
    // {
    //     return $this->hasMany('App\Models\DocumentCategory', 'parent_id', 'id');
    // }
}
