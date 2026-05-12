<?php

namespace App\Http\Controllers;

use App\Models\Fandraisana;
use App\Models\Kristianina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FandraisanaController extends Controller
{
    public function index()
    {
        $fandraisanas = Fandraisana::with('kristianina')->latest()->paginate(10);
        return view('fandraisana.index', compact('fandraisanas'));
    }

    public function create()
    {
        $kristianinas = Kristianina::where('batisa', true)
            ->where('mpandray', false)
            ->orderBy('anarana')
            ->get();
        return view('fandraisana.create', compact('kristianinas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kristianina_id' => 'required|exists:kristianinas,id',
            'daty'           => 'required|date',
            'mpanao'         => 'nullable|string|max:255',
            'fanamarinana'   => 'nullable|string',
        ]);

        // Vérifications métier avant d'ouvrir la transaction.
        $kristianina = Kristianina::findOrFail($validated['kristianina_id']);

        if (!$kristianina->batisa) {
            return back()->withErrors(['kristianina_id' => 'Tsy vita batisa ilay kristianina.'])->withInput();
        }

        if ($kristianina->mpandray) {
            return back()->withErrors(['kristianina_id' => 'Mpandray sahady ilay kristianina.'])->withInput();
        }

        // Les deux opérations sont atomiques : si l'une échoue, l'autre est annulée.
        DB::transaction(function () use ($validated, $kristianina) {
            Fandraisana::create($validated);

            $kristianina->update([
                'mpandray'      => true,
                'mpandray_daty' => $validated['daty'],
            ]);
        });

        return redirect()->route('fandraisana.index')
            ->with('success', 'Fandraisana voaforona ary kristianina novaina soamantsara!');
    }

    public function show(Fandraisana $fandraisana)
    {
        $fandraisana->load('kristianina');
        return view('fandraisana.show', compact('fandraisana'));
    }

    public function destroy(Fandraisana $fandraisana)
    {
        // Charger la relation avant suppression pour éviter un accès après delete.
        $kristianina = $fandraisana->kristianina;

        DB::transaction(function () use ($fandraisana, $kristianina) {
            $fandraisana->delete();

            $kristianina->update([
                'mpandray'      => false,
                'mpandray_daty' => null,
            ]);
        });

        return redirect()->route('fandraisana.index')
            ->with('success', 'Fandraisana voafafa ary kristianina novaina!');
    }
}