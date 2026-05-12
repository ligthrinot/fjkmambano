<?php

namespace App\Http\Controllers;

use App\Models\Fianakaviana;
use Illuminate\Http\Request;

class FianakavianaController extends Controller
{
    public function index()
    {
        $fianakaviana = Fianakaviana::latest()->paginate(10);
        return view('fianakaviana.index', compact('fianakaviana'));
    }

    public function create()
    {
        return view('fianakaviana.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'anarana'      => 'required|string|max:255',
            'adressy'      => 'required|string|max:255',
            'faritra'      => 'required|string|max:255',
            'fokontany'    => 'required|string|max:255',
            'fifandraisana'=> 'nullable|string|max:255',
            'fanamarihana' => 'nullable|string',
        ]);

        Fianakaviana::create($request->all());

        return redirect()->route('fianakaviana.index')
                         ->with('success', 'Fianakaviana voaforona soamantsara!');
    }

    public function show(Fianakaviana $fianakaviana)
    {
        $fianakaviana->load('kristianinas');
        return view('fianakaviana.show', compact('fianakaviana'));
    }

    public function edit(Fianakaviana $fianakaviana)
    {
        return view('fianakaviana.edit', compact('fianakaviana'));
    }

    public function update(Request $request, Fianakaviana $fianakaviana)
    {
        $request->validate([
            'anarana'      => 'required|string|max:255',
            'adressy'      => 'required|string|max:255',
            'faritra'      => 'required|string|max:255',
            'fokontany'    => 'required|string|max:255',
            'fifandraisana'=> 'nullable|string|max:255',
            'fanamarihana' => 'nullable|string',
        ]);

        $fianakaviana->update($request->all());

        return redirect()->route('fianakaviana.index')
                         ->with('success', 'Fianakaviana novaina soamantsara!');
    }

    public function destroy(Fianakaviana $fianakaviana)
    {
        $fianakaviana->delete();

        return redirect()->route('fianakaviana.index')
                         ->with('success', 'Fianakaviana voafafa!');
    }
}