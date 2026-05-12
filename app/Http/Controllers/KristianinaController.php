<?php

namespace App\Http\Controllers;

use App\Models\Kristianina;
use App\Models\Fianakaviana;
use Illuminate\Http\Request;

class KristianinaController extends Controller
{
    public function index()
    {
        $kristianinas = Kristianina::with('fianakaviana')->latest()->paginate(10);
        return view('kristianina.index', compact('kristianinas'));
    }

    public function create()
    {
        $fianakaviana = Fianakaviana::orderBy('anarana')->get();
        return view('kristianina.create', compact('fianakaviana'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'anarana'             => 'required|string|max:255',
            'fanampiny'           => 'required|string|max:255',
            'daty_nahaterahana'   => 'nullable|date',
            'daty_nidirana'       => 'nullable|date',
            'fiangonana_niaviana' => 'nullable|string|max:255',
            'batisa'              => 'nullable|boolean',
            'batisa_daty'         => 'nullable|date',
            'batisa_toerana'      => 'nullable|string|max:255',
            'mpandray'            => 'nullable|boolean',
            'mpandray_daty'       => 'nullable|date',
            'mpandray_toerana'    => 'nullable|string|max:255',
            'fianakaviana_id'     => 'nullable|exists:fianakaviana,id',
            'andraikitra'         => 'nullable|string|max:255',
            'laharana'            => 'nullable|string|max:255',
            'fanamarinana'        => 'nullable|string',
        ]);

        // Les checkboxes non cochées ne sont pas envoyées par le navigateur,
        // donc on force explicitement à 0 si absent des données validées.
        $validated['batisa']   = $request->has('batisa') ? 1 : 0;
        $validated['mpandray'] = $request->has('mpandray') ? 1 : 0;

        Kristianina::create($validated); // ✅ uniquement les champs validés

        return redirect()->route('kristianina.index')
                         ->with('success', 'Kristianina voaforona soamantsara!');
    }

    public function show(Kristianina $kristianina)
    {
        $kristianina->load(['fianakaviana', 'diakonas.groupeDiakona', 'batisaRecord']);
        return view('kristianina.show', compact('kristianina'));
    }

    public function edit(Kristianina $kristianina)
    {
        $fianakaviana = Fianakaviana::orderBy('anarana')->get();
        return view('kristianina.edit', compact('kristianina', 'fianakaviana'));
    }

    public function update(Request $request, Kristianina $kristianina)
    {
        $validated = $request->validate([
            'anarana'             => 'required|string|max:255',
            'fanampiny'           => 'required|string|max:255',
            'daty_nahaterahana'   => 'nullable|date',
            'daty_nidirana'       => 'nullable|date',
            'fiangonana_niaviana' => 'nullable|string|max:255',
            'batisa'              => 'nullable|boolean',
            'batisa_daty'         => 'nullable|date',
            'batisa_toerana'      => 'nullable|string|max:255',
            'mpandray'            => 'nullable|boolean',
            'mpandray_daty'       => 'nullable|date',
            'mpandray_toerana'    => 'nullable|string|max:255',
            'fianakaviana_id'     => 'nullable|exists:fianakaviana,id',
            'andraikitra'         => 'nullable|string|max:255',
            'laharana'            => 'nullable|string|max:255',
            'fanamarinana'        => 'nullable|string',
        ]);

        $validated['batisa']   = $request->has('batisa') ? 1 : 0;
        $validated['mpandray'] = $request->has('mpandray') ? 1 : 0;

        $kristianina->update($validated); // ✅ uniquement les champs validés

        return redirect()->route('kristianina.index')
                         ->with('success', 'Kristianina novaina soamantsara!');
    }

    public function destroy(Kristianina $kristianina)
    {
        $kristianina->delete();

        return redirect()->route('kristianina.index')
                         ->with('success', 'Kristianina voafafa!');
    }
}