<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\PollOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PollController extends Controller
{
    public function index()
    {
    $polls = Poll::orderByRaw('CASE WHEN start_date <= NOW() AND end_date >= NOW() THEN 0 ELSE 1 END, start_date ASC')->paginate(16);
        return view('home', compact('polls'));
    }
    public function new()
    {
        return view('pollNew');
    }
    public function show(Poll $poll)
    {
        if (!Auth::check()) {
            $userId = Auth::id();
            return redirect()->route('user.login')->withErrors(['error' => 'Você precisa se logar para votar.']);
        }
        elseif($poll->user_id == Auth::id()){
            $options = PollOption::where('poll_id', $poll->id)->get();

            return view('pollNew')->with([
                'poll' => $poll,
                'options' => $options
            ]);
        }
         elseif ($poll->start_date > now()) {
            return redirect()->route('home')->withErrors(['error' => 'Esta enquete ainda não começou.']);
        }
         elseif ($poll->end_date < now()) {
            return redirect()->route('home')->withErrors(['error' => 'Esta enquete já terminou.']);
        }


        $options = PollOption::where('poll_id', $poll->id)->get();

        return view('pollView', [
            'poll' => $poll,
            'options' => $options
        ]);
    }

 public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        'options' => 'required|array|min:3|filled',
        'options.title' => 'string',
    ], [
        'title.required' => 'O campo título é obrigatório.',
        'title.string' => 'O campo título deve conter uma ou mais palavras.',
        'start_date.required' => 'O campo data de início é obrigatório.',
        'end_date.required' => 'O campo data de término é obrigatório.',
        'end_date.after' => 'A data de término deve ser maior que a data de início.',
        'options.min' => 'A enquete deve ter no mínimo 3 opções.',
        'options.filled' => 'A enquete deve ter no mínimo 3 opções.',
        'options.*.string' => 'Todas as opções devem conter uma ou mais palavras.',
    ]);
    if($request->poll_id && $request->user_id) {
        $poll = Poll::find($request->poll_id);
        $poll->user_id = $request->user_id;
    }else {
        $poll = new Poll();
        $poll->user_id = Auth::id();
    }


    $poll->title = $request->title;
    $poll->start_date = $request->start_date;
    $poll->end_date = $request->end_date;

    $options = $request->options;

    $poll->save();
    foreach ($options as $option) {
        if(isset($option['id'])) {
            $pollOption = PollOption::find($option['id']);
            $pollOption->title = $option['title'];
        }else {
            $pollOption = new PollOption();
            $pollOption->title = $option;
        }
        $pollOption->poll_id = $poll->id;
        $pollOption->votes = 0;
        $pollOption->save();
    }
    if($request->user_id) {
        return redirect()->route('home')->with('success', 'Enquete atualizada com sucesso.');
    }
    return redirect()->route('home')->with('success', 'Enquete criada com sucesso.');
    }
}

