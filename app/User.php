<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
	
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * All drafts attached to this draft.
     *
     * @return array
     */
    public function drafts()
    {
        return $this->belongsToMany('App\Draft')->withPivot('position');
    }

    /**
     * All drafts attached to this draft.
     *
     * @return array
     */
    public function picks()
    {
        return $this->hasMany('App\Pick');
    }
}
