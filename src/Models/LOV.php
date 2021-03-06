<?php

namespace Mojoblanco\LOV\Models;

use Illuminate\Database\Eloquent\Model;

class LOV extends Model
{
    protected $fillable = ['category_id', 'value', 'label', 'is_active'];

    protected $guarded = ['id'];

    public function getTable()
    {
        return config('lov.table_names.values');
    }

    public function category()
    {
        return $this->belongsTo(LOVCategory::class);
    }
}