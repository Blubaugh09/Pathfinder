<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserInteractionRequest;
use App\Http\Requests\StoreUserInteractionRequest;
use App\Http\Requests\UpdateUserInteractionRequest;
use App\Models\User;
use App\Models\UserInteraction;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserInteractionsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_interaction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userInteractions = UserInteraction::with(['user'])->get();

        return view('frontend.userInteractions.index', compact('userInteractions'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_interaction_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.userInteractions.create', compact('users'));
    }

    public function store(Request $request)
    {
        // Validate the request data as needed
        $data = $request->validate([
            'node_or_link_number' => 'required',
            'type' => 'required|in:node,link',
            'user_id' => 'required|exists:users,id'
        ]);
    
        // Create a new user interaction with the validated data
        $userInteraction = UserInteraction::create($data);
    
        // You could return a JSON response or something else if needed
        return response()->json($userInteraction, 201);
    }
    

    public function edit(UserInteraction $userInteraction)
    {
        abort_if(Gate::denies('user_interaction_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $userInteraction->load('user');

        return view('frontend.userInteractions.edit', compact('userInteraction', 'users'));
    }

    public function update(UpdateUserInteractionRequest $request, UserInteraction $userInteraction)
    {
        $userInteraction->update($request->all());

        return redirect()->route('frontend.user-interactions.index');
    }

    public function show(UserInteraction $userInteraction)
    {
        abort_if(Gate::denies('user_interaction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userInteraction->load('user');

        return view('frontend.userInteractions.show', compact('userInteraction'));
    }

    public function destroy(UserInteraction $userInteraction)
    {
        abort_if(Gate::denies('user_interaction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userInteraction->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserInteractionRequest $request)
    {
        $userInteractions = UserInteraction::find(request('ids'));

        foreach ($userInteractions as $userInteraction) {
            $userInteraction->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
