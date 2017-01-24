<?php

namespace App\Http\Controllers;

use App\Draft;

class DraftController extends Controller
{
    /**
   * The user repository instance.
   */
  protected $drafts;

  /**
   * Create a new controller instance.
   *
   * @param  Draft  drafts
   */
  public function __construct(Draft $drafts)
  {
      $this->drafts = $drafts;
  }

    /**
     * Fetch all drafts.
     *
     * @return Response
     */
    public function index()
    {
        $drafts = $this->drafts->get();
        foreach ($drafts as $draft) {
            $draft->users = $draft->users;
            $draft->picks = $draft->picks;
        }

        return response()->json($drafts);
    }
}
