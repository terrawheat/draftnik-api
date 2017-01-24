<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
    /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'drafts';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'year',
  ];

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = [
      '',
  ];

  /**
   * All users attached to this draft.
   *
   * @return array
   */
  public function users()
  {
      return $this->belongsToMany('App\User')->withPivot('position');
  }

  /**
   * All users attached to this draft.
   *
   * @return array
   */
  public function picks()
  {
      return $this->hasMany('App\Pick');
  }
}
