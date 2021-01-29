<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Folder extends Model
{
    use HasFactory;

    public function children() : HasMany
    {
        return $this->hasMany(Folder::class,'parent_id');
    }

    public function parent() : BelongsTo
    {
        return $this->belongsTo(Folder::class,'parent_id', 'id');
    }
}
