<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory, SoftDeletes;
    // protected $primaryKey = 'slug';
    protected $fillable = [
        'id_type',
        'id_unit',
        'title',
        'slug',
        'file_doc',
    ];
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
}
