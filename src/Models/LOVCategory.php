<?php

namespace Mojoblanco\LOV\Models;

use Illuminate\Database\Eloquent\Model;

class LOVCategory extends Model
{
    protected $fillable = ['name', 'description', 'is_active'];

    protected $guarded = ['id'];

    public function getTable()
    {
        return config('lov.table_names.categories');
    }

    public function values()
    {
        return $this->hasMany(LOVCategory::class, 'category_id');
    }
}