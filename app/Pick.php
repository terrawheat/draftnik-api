<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pick extends Model
{
    /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'picks';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'user_id',
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
      return $this->belongsTo('App\User')->withPivot('position');
  }

  /**
   * All users attached to this draft.
   *
   * @return array
   */
  public function drafts()
  {
      return $this->belongsTo('App\Draft')->withPivot('position');
  }
}
