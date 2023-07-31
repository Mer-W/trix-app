<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Game extends Model
{
  use HasFactory;

  protected $fillable = [
    'north_id',
    'east_id',
    'south_id',
    'west_id'
];

  public function hands()
  {
    return $this->hasMany(Hand::class);
  }

  public function north()
  {
    return $this->belongsTo(User::class);
  }

  public function east()
  {
    return $this->belongsTo(User::class);
  }

  public function south()
  {
    return $this->belongsTo(User::class);
  }

  public function west()
  {
    return $this->belongsTo(User::class);
  }

  public function jacks($user)
  {
    $count = DB::table('hands')->where('dealer_id', $user->id)->where('game_id', $this->id)->where('contract', 'j')->count();
    return $count;
  }

  public function queens($user)
  {
    $count = DB::table('hands')->where('dealer_id', $user->id)->where('game_id', $this->id)->where('contract', 'q')->count();
    return $count;
  }
  public function king($user)
  {
    $count = DB::table('hands')->where('dealer_id', $user->id)->where('game_id', $this->id)->where('contract', 'k')->count();
    return $count;
  }
  public function nt($user)
  {
    $count = DB::table('hands')->where('dealer_id', $user->id)->where('game_id', $this->id)->where('contract', 'nt')->count();
    return $count;
  }
  public function diamonds($user)
  {
    $count = DB::table('hands')->where('dealer_id', $user->id)->where('game_id', $this->id)->where('contract', 'd')->count();
    return $count;
  }

  public function score_n()
  {
    $score = DB::table('hands')->where('game_id', $this->id)->sum('north');
    return $score;
  }

  public function score_e()
  {
    $score = DB::table('hands')->where('game_id', $this->id)->sum('east');
    return $score;
  }

  public function score_s()
  {
    $score = DB::table('hands')->where('game_id', $this->id)->sum('south');
    return $score;
  }

  public function score_w()
  {
    $score = DB::table('hands')->where('game_id', $this->id)->sum('west');
    return $score;
  }
}
