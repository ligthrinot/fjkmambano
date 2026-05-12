<?php

namespace App\Http\Controllers;

use App\Models\Fandraisana;
use App\Models\Kristianina;
use Illuminate\Http\Request;

class FandraisanaController extends Controller
{
    public function index()
    {
        $fandraisanas = Fandraisana::with('kristianina')->latest()->paginate(10);
        return view('fandraisana.index', compact('fandraisanas'));
    }

    public function create()
    {
        // Doit être baptisé ET pas encore mpandray
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

        // Vérifier qu'il est bien batisé et pas encore mpandray
        $kristianina = Kristianina::findOrFail($request->kristianina_id);

        if (!$kristianina->batisa) {
            return back()->withErrors(['kristianina_id' => 'Tsy vita batisa ilay kristianina.'])->withInput();
        }

        if ($kristianina->mpandray) {
            return back()->withErrors(['kristianina_id' => 'Mpandray sahady ilay kristianina.'])->withInput();
        }

        Fandraisana::create($validated);

        // Mettre à jour automatiquement le kristianina
        $kristianina->update([
            'mpandray'         => true,
            'mpandray_daty'    => $request->daty,
        ]);

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
        $kristianina = $fandraisana->kristianina;

        $fandraisana->delete();

        // Remettre le kristianina comme non mpandray
        $kristianina->update([
            'mpandray'      => false,
            'mpandray_daty' => null,
        ]);

        return redirect()->route('fandraisana.index')
            ->with('success', 'Fandraisana voafafa ary kristianina novaina!');
    }
}