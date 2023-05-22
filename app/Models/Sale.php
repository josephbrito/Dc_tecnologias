<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{

    protected $casts = [
        "observations" => "array",
        "dates" => "array",
        "price_of_installments"=> "array"
    ];

    protected $guarded = [];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    use HasFactory;
}
