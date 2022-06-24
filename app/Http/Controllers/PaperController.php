<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    public function index()
    {
        $papers = Paper::all();
        return view('paper.index', compact('papers'));
    }

    public function create()
    {
        return view('paper.create');
    }

    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            'title' => 'required',
        ])->validate();

        Paper::create($request->all());
        return redirect()->route('index')->with('success', 'New paper added');
    }

    public function edit($id)
    {
        $paper = Paper::where('id', $id)->first();
        return view('paper.edit', compact('paper'));
    }

    public function update(Request $request, $id)
    {
        $paper = Paper::findOrfail($id);

        $paper->update($request->all());
        return redirect()->route('index')->with('success', 'Paper updated successfully.');
    }
}
