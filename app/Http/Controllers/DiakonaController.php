<?php

namespace App\Http\Controllers;

use App\Models\Diakona;
use App\Models\Kristianina;
use App\Models\GroupeDiakona;
use Illuminate\Http\Request;

class DiakonaController extends Controller
{
    public function index()
    {
        $actifs   = Diakona::with(['kristianina', 'groupeDiakona'])
                            ->actif()->latest()->get();
        $termines = Diakona::with(['kristianina', 'groupeDiakona'])
                            ->termine()->latest()->get();
        return view('diakona.index', compact('actifs', 'termines'));
    }

    public function create()
    {
        $kristianinas = Kristianina::where('mpandray', true)
                        ->orderBy('anarana')->get();
        $groupes = GroupeDiakona::orderBy('anarana')->get();
        return view('diakona.create', compact('kristianinas', 'groupes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kristianina_id'    => 'required|exists:kristianinas,id',
            'groupe_diakona_id' => 'required|exists:groupe_diakonas,id',
            'karazana'          => 'required|in:Diakona,Loholona',
            'daty_fidiana'      => 'required|date',
            'daty_manomboka'    => 'required|date',
            'daty_farany'       => 'nullable|date|after:daty_manomboka',
            'fanamariana'       => 'nullable|string',
        ]);

        // Désactiver l'ancien mandat actif si existe
        Diakona::where('kristianina_id', $validated['kristianina_id'])
                ->where('active', true)
                ->update(['active' => false, 'daty_farany' => $validated['daty_manomboka']]);

        Diakona::create([
            ...$validated, // ✅ uniquement les champs validés
            'active' => true,
        ]);

        return redirect()->route('diakona.index')
                         ->with('success', 'Diakona/Loholona voafidy soamantsara!');
    }

    /**
     * Affiche le détail d'un Diakona ET l'historique complet des mandats
     * du kristianina associé.
     *
     * CORRECTION : on injecte Diakona (cohérent avec la route diakona/{diakona}),
     * puis on remonte au kristianina depuis la relation, au lieu d'injecter
     * directement Kristianina ce qui causait un 404 (mauvaise résolution d'ID).
     */
    public function show(Diakona $diakona)
    {
        $diakona->load('groupeDiakona');

        $kristianina = $diakona->kristianina;

        $historique = Diakona::with('groupeDiakona')
                              ->where('kristianina_id', $kristianina->id)
                              ->orderByDesc('daty_fidiana')
                              ->get();

        return view('diakona.show', compact('diakona', 'kristianina', 'historique'));
    }

    public function edit(Diakona $diakona)
    {
        $kristianinas = Kristianina::where('mpandray', true)
                        ->orderBy('anarana')->get();
        $groupes = GroupeDiakona::orderBy('anarana')->get();
        return view('diakona.edit', compact('diakona', 'kristianinas', 'groupes'));
    }

    public function update(Request $request, Diakona $diakona)
    {
        $validated = $request->validate([
            'kristianina_id'    => 'required|exists:kristianinas,id',
            'groupe_diakona_id' => 'required|exists:groupe_diakonas,id',
            'karazana'          => 'required|in:Diakona,Loholona',
            'daty_fidiana'      => 'required|date',
            'daty_manomboka'    => 'required|date',
            'daty_farany'       => 'nullable|date|after:daty_manomboka',
            'active'            => 'boolean',
            'fanamariana'       => 'nullable|string',
        ]);

        $diakona->update([
            ...$validated, // ✅ uniquement les champs validés
            'active' => $request->has('active') ? 1 : 0,
        ]);

        return redirect()->route('diakona.index')
                         ->with('success', 'Diakona/Loholona novaina soamantsara!');
    }

    public function destroy(Diakona $diakona)
    {
        $diakona->delete();
        return redirect()->route('diakona.index')
                         ->with('success', 'Voafafa soamantsara!');
    }

    public function terminer(Diakona $diakona)
    {
        $diakona->update([
            'active'      => false,
            'daty_farany' => now(),
        ]);
        return redirect()->route('diakona.index')
                         ->with('success', 'Mandat voafarana!');
    }
}