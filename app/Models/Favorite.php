<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'scream_id',
        'created_at',
        'updated_at'
    ];

    public function users() {
        return $this->belongsTo('App\Models\User');
    }

    public function screams() {
        return $this->belongsTo('App\Models\Scream');
    }
}
