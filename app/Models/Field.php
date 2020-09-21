<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;
    protected $table = 'field';
    protected $guarded = [];

    public function docField()
    {
        return $this->hasMany('App\Models\DocumentField', 'field_id', 'id');
    }

    public function value()
    {
        return $this->hasMany('App\Models\DocumentValue', 'field_id', 'id');
    }
}
