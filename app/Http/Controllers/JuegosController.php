<?php

namespace App\Http\Controllers;

use App\Http\Resources\JuegosResource;
use App\Models\Juegos;
use Illuminate\Http\Request;

class JuegosController extends Controller
{
    public function getAllGames()
    {
        $games = Juegos::paginate(8);

        return JuegosResource::collection($games);
    }

    public function getGameById($id)
    {
        $game = Juegos::where('id', $id)->first();

        if (!$game) {
            return response()->json(['message' => 'Juego no encontrado'], 404);
        }

        return new JuegosResource($game);
    }

    public function saveGame(Request $request)
    {
        $validated = $request->validate([
            'name_game' => 'required|string|max:255',
            'image_url' => 'nullable|string|max:2048',
            'plataforma' => 'required|string|max:100',
            'estado' => 'required|string|max:100',
        ]);

        $game = Juegos::create($validated);

        return new JuegosResource($game);
    }

    public function updateGame(Request $request, $id)
    {
        $validated = $request->validate([
            'name_game' => 'sometimes|string|max:255',
            'image_url' => 'nullable|string|max:2048',
            'plataforma' => 'sometimes|string|max:100',
            'estado' => 'sometimes|string|max:100',
        ]);

        $game = Juegos::where('id', $id)->first();

        if (!$game) {
            return response()->json(['message' => 'Juego no encontrado'], 404);
        }

        $game->update($validated);

        return new JuegosResource($game);
    }

    public function deleteGame($id)
    {
        $game = Juegos::where('id', $id)->first();

        if (!$game) {
            return response()->json(['message' => 'Juego no encontrado'], 404);
        }

        $game->delete();

        return response()->json(['message' => 'Juego eliminado correctamente'], 200);
    }
}
