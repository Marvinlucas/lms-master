<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionRequest;
use App\Models\Session;
use App\Models\Term;
use Illuminate\Http\Request;

class ModalSessionController extends Controller
{
    public function store(SessionRequest $request)
{
    $this->authorize('session.create');

    $session = Session::create($request->all());

    // Assuming you have a 'term_id' in your sessions table
    $term = Term::find($request->input('term_id'));

    // Attach the session to the term with an order
    $order = $term->sessions()->max('order') + 1;

    $term->sessions()->attach($session, ['order' => $order]);

    return back()->with('success', __('item created successfully'));
}

    
}
