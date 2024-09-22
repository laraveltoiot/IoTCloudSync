<?php

namespace App\Http\Controllers;

use App\Models\Thing;

class ThingController extends Controller
{
    public function index() {
        return view('things.index');
    }

    public function create() {
        return view('device.create');
    }
    public function edit(Thing $thing) {
        return view('things.edit', compact('thing'));
    }

    public function show($id) {
        $thing = Thing::findOrFail($id);
        return view('things.show', compact('thing'));
    }
}
