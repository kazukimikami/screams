<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scream extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'scream_text',
        'created_at',
        'updated_at'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    public function favorites() {
        return $this->hasMany('App\Models\Favorite');
    }
}
