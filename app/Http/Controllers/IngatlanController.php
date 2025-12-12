<?php

namespace App\Http\Controllers;

use App\Models\Ingatlan;
use Illuminate\Http\Request;

class IngatlanController extends Controller
{
    public function index()
    {
        return response()->json(
            Ingatlan::with('kategoria')->get()
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategoria_id' => ['required', 'integer', 'exists:kategoriak,id'],
            'leiras' => ['required', 'string'],
            'datum' => ['required', 'date'],
            'tehermentes' => ['required', 'boolean'],
            'ar' => ['required', 'integer', 'min:0'],
            'kepUrl' => ['required', 'string', 'max:255'],
        ]);

        $ingatlan = Ingatlan::create($validated);

        return response()->json($ingatlan, 201);
    }

    public function torles($id)
    {
        $ingatlan = Ingatlan::find($id);

        if (!$ingatlan) {
            return response()->json(['message' => 'Nincs ilyen ingatlan'], 404);
        }

        $ingatlan->delete();

        return response()->json(['message' => 'Az ingatlan törölve lett'], 200);
    }

    public function show($id)
    {
        $ingatlan = Ingatlan::with('kategoria')->find($id);

        if (!$ingatlan) {
            return response()->json(['message' => 'Nincs ilyen ingatlan'], 404);
        }

        return response()->json($ingatlan);
    }
}
