<?php

namespace App\Http\Controllers;

use App\Models\Batisa;
use App\Models\Kristianina;
use Illuminate\Http\Request;

class BatisaController extends Controller
{
    public function index()
    {
        $batisas = Batisa::with('kristianina')->latest()->paginate(10);
        return view('batisa.index', compact('batisas'));
    }

    public function create()
    {
        $kristianinas = Kristianina::where('batisa', false)
            ->orderBy('anarana')
            ->get();
        return view('batisa.create', compact('kristianinas'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'kristianina_id' => 'required|exists:kristianinas,id',
        'daty'           => 'required|date',
        'mpanao_batisa'  => 'nullable|string|max:255',
        'fanamarinana'   => 'nullable|string',
    ]);

    Batisa::create($validated);

    Kristianina::find($request->kristianina_id)->update([
        'batisa'      => true,
        'batisa_daty' => $request->daty,
    ]);

    return redirect()->route('batisa.index')
        ->with('success', 'Batisa voaforona ary kristianina novaina soamantsara!');
}
    public function show(Batisa $batisa)
    {
        $batisa->load('kristianina');
        return view('batisa.show', compact('batisa'));
    }

    public function destroy(Batisa $batisa)
    {
        $kristianina = $batisa->kristianina;

        $batisa->delete();

        $kristianina->update([
            'batisa'      => false,
            'batisa_daty' => null,
        ]);

        return redirect()->route('batisa.index')
            ->with('success', 'Batisa voafafa ary kristianina novaina!');
    }
}