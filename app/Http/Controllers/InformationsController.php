<?php

namespace App\Http\Controllers;
use App\Models\Informations;
use Illuminate\Http\Request;

class InformationsController extends Controller
{
    // Create a new information
    public function create(Request $request)
    {
        $data = $request->only([
            "fname",
            "lname",
            "age",
            "phone",
            "email"
        ]);

        $information = Informations::create($data);

        return response()->json($information, 201);
    }

    // Get all information
    public function index()
    {
        $informations = Informations::all();

        return response()->json($informations);
    }

    // Get a specific information by ID
    public function show($id)
    {
        $information = Informations::find($id);

        if (!$information) {
            return response()->json(['error' => 'Information not found'], 404);
        }

        return response()->json($information);
    }

    public function update(Request $request, $id)
    {
        $information = Informations::find($id);

        if (!$information) {
            return response()->json(['error' => 'Information not found'], 404);
        }

        $data = $request->only([
            "fname",
            "lname",
            "age",
            "phone",
            "email"
        ]);

        $information->fill($data);
        $information->save();

        return response()->json($information);
    }

    public function destroy($id)
    {
        $information = Informations::find($id);

        if (!$information) {
            return response()->json(['error' => 'Information not found'], 404);
        }

        $information->delete();

        return response()->json(['message' => 'Information deleted successfully']);
    }
}