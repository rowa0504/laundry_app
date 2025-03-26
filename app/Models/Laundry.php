<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
    public function tags() {
        return $this->belongsToMany(Tag::class, 'laundry_tag');
    }
}
