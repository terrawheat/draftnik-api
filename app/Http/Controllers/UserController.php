<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    /**
   * The user repository instance.
   */
  protected $users;

  /**
   * Create a new controller instance.
   *
   * @param  User  $users
   */
  public function __construct(User $users)
  {
      $this->users = $users;
  }

    /**
     * Fetch all users.
     *
     * @return Response
     */
    public function index()
    {
        $users = $this->users->get();

        return response()->json($users);
    }
}
