<?php

namespace App\Http\Controllers;

use App\Models\GroupeDiakona;
use Illuminate\Http\Request;

class GroupeDiakonaController extends Controller
{
    public function index()
    {
        $groupes = GroupeDiakona::latest()->paginate(10);
        return view('groupe_diakona.index', compact('groupes'));
    }

    public function create()
    {
        return view('groupe_diakona.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'anarana'     => 'required|string|max:255',
            'fanamariana' => 'nullable|string',
        ]);

        GroupeDiakona::create($request->all());

        return redirect()->route('groupe_diakona.index')
                         ->with('success', 'Groupe Diakona voaforona soamantsara!');
    }

    public function show(GroupeDiakona $groupeDiakona)
{
    $groupeDiakona->load('diakonas.kristianina');
    return view('groupe_diakona.show', compact('groupeDiakona'));
}

    public function edit(GroupeDiakona $groupeDiakona)
    {
        return view('groupe_diakona.edit', compact('groupeDiakona'));
    }

    public function update(Request $request, GroupeDiakona $groupeDiakona)
    {
        $request->validate([
            'anarana'     => 'required|string|max:255',
            'fanamariana' => 'nullable|string',
        ]);

        $groupeDiakona->update($request->all());

        return redirect()->route('groupe_diakona.index')
                         ->with('success', 'Groupe Diakona novaina soamantsara!');
    }

    public function destroy(GroupeDiakona $groupeDiakona)
    {
        $groupeDiakona->delete();

        return redirect()->route('groupe_diakona.index')
                         ->with('success', 'Groupe Diakona voafafa!');
    }

    
}