<?php

namespace App\Http\Controllers;

use App\Models\PollOption;

class PollOptionController extends Controller
{
    public function store()
    {

    }
    public function vote($id)
    {
        $PollOption = PollOption::where('id', $id)->first();

        $PollOption->votes++;
        $PollOption->save();
    }
    public function getVotes($pollId)
    {
        $options = PollOption::where('poll_id', $pollId)->get();
        return response()->json($options);
    }
}
