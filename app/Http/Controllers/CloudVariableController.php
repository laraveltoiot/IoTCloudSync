<?php

namespace App\Http\Controllers;

use App\Models\CloudVariable;

class CloudVariableController extends Controller
{
    public function index() {
        return view('cloudVariable.index');
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
