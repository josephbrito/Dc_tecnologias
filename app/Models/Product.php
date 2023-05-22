<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function sale() {
        return $this->belongsTo("App\Models\Sale");
    }
    use HasFactory;
}
