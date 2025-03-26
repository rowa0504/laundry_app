<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function laundries() {
        return $this->belongsToMany(Laundry::class, 'laundry_tag');
    }
}
