<?php

namespace App\Http\Controllers;

use App\Models\CloudVariable;
use App\Models\Thing;

class CloudVariableController extends Controller
{
    public function index($thingId = null)
    {
        $user = auth()->user();

        // Fetch all Things associated with the authenticated user
        $things = $user->things;

        if ($things->isEmpty()) {
            return view('cloudVariable.index', ['message' => 'Please create a Thing first.']);
        }

        // Fetch all Cloud Variables associated with the user's Things
        $cloudVariables = CloudVariable::whereIn('thing_id', $things->pluck('id'))->get();

        return view('cloudVariable.index', compact('cloudVariables'));
    }


    public function create()
    {
        $user = auth()->user();
        $things = $user->things;

        if ($things->isEmpty()) {
            return redirect()->route('things.create')->with('message', 'Please create a Thing first.');
        }

        return view('cloudVariable.create', compact('things'));
    }
    public function edit(CloudVariable $cloudVariable) {
        return view('cloudVariable.edit', compact('cloudVariable'));
    }

    public function show($id) {
        $cloudVariable = CloudVariable::findOrFail($id);
        return view('cloudVariable.show', compact('cloudVariable'));
    }
}
