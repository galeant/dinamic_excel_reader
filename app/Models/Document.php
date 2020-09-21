<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $table = 'document';
    protected $guarded = [];
    protected $appends = [
        'grouping_horizontal_field'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\DocumentCategory', 'category_id', 'id');
    }

    public function mainCategory()
    {
        return $this->belongsTo('App\Models\DocumentCategory', 'main_category_id', 'id');
    }

    public function horizontalField()
    {
        return $this->hasMany('App\Models\DocumentField', 'document_id', 'id')->orderBy('order', 'ASC');
    }

    public function getGroupingHorizontalFieldAttribute()
    {
        if ($this->horizontalField->count() > 0) {
            return $this->horizontalField->groupBy('subdocument_order');
        }
        return NULL;
    }
}
