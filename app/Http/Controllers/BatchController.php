<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    public function index()
    {
        $batches = Batch::latest()->paginate(5);
        return view('admin.filters.batch.index', compact('batches'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.filters.batch.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        Batch::create($request->all());

        return redirect()->route('batch.index')->with('success', 'Batch created successfully.');
    }

    public function show(Batch $batch)
    {
        return view('admin.filters.batch.show', compact('batch'));
    }

    public function edit(Batch $batch)
    {
        return view('admin.filters.batch.edit', compact('batch'));
    }

    public function update(Request $request, Batch $batch)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $batch->update($request->all());

        return redirect()->route('batch.index')->with('success', 'Batch updated successfully');
    }
    public function destroy(Batch $batch)
    {
        $batch->delete();

        return redirect()->route('batch.index')->with('success', 'Batch deleted successfully');
    }
}
