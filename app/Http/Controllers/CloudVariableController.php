<?php

namespace App\Http\Controllers;

use App\Models\CloudVariable;
use App\Models\Thing;

class CloudVariableController extends Controller
{
    public function index($thingId = null)
    {
        if ($thingId) {
            // Fetch the Thing by ID
            $thing = Thing::find($thingId);

            if (!$thing) {
                // If Thing not found, display a message
                return view('cloudVariable.index', ['message' => 'Thing not found.']);
            }

            // Fetch Cloud Variables for the specified Thing
            $cloudVariables = CloudVariable::where('thing_id', $thingId)->get();

            return view('cloudVariable.index', compact('cloudVariables', 'thing'));
        } else {
            // No Thing ID provided
            return view('cloudVariable.index', ['message' => 'No Thing selected.']);
        }
    }

    public function create() {
        return view('cloudVariable.create');
    }
    public function edit(CloudVariable $cloudVariable) {
        return view('cloudVariable.edit', compact('cloudVariable'));
    }

    public function show($id) {
        $cloudVariable = CloudVariable::findOrFail($id);
        return view('cloudVariable.show', compact('cloudVariable'));
    }
}
