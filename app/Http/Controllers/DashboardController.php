<?php

namespace App\Http\Controllers;

use App\Models\Kristianina;
use App\Models\Fianakaviana;
use App\Models\Diakona;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            // Membres
            'total_kristianina'     => Kristianina::count(),
            'batisa_eny'            => Kristianina::where('batisa', true)->count(),
            'batisa_tsia'           => Kristianina::where('batisa', false)->count(),
            'mpandray_eny'          => Kristianina::where('mpandray', true)->count(),
            'mpandray_tsia'         => Kristianina::where('mpandray', false)->count(),

            // Familles
            'total_fianakaviana'    => Fianakaviana::count(),

            // Nouveaux membres ce mois
            'nouveaux_ce_mois'      => Kristianina::whereMonth('created_at', now()->month)
                                                   ->whereYear('created_at', now()->year)
                                                   ->count(),

            // Diacres & Anciens actifs
            'diakonas_actifs'       => Diakona::where('active', true)->where('karazana', 'Diakona')->count(),
            'loholona_actifs'       => Diakona::where('active', true)->where('karazana', 'Loholona')->count(),
        ];

        return view('dashboard', compact('stats'));
    }
}
