<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hand extends Model
{
    use HasFactory;

 
        protected $fillable = [
        'game_id',
        'dealer_id',
        'contract',
        'north',
        'east',
        'south',
        'west'
    ];

    public function game() {
        return $this->belongsTo(Game::class);
    }

    public function dealer() {
        return $this->belongsTo(User::class);
      }



}
