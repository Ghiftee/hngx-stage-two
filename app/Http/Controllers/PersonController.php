<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'name' => 'required|string'
        ]);

        try {
            $person = new Person();
            $person->name = $request->input('name');
            $person->save();
            return response()->json($person, 201);
        } catch(\Illuminate\Database\QueryException $e){
            if  ($e->errorInfo[1] == 1062){
                return response()->json(['message' => 'Person with the same name already exists'], 409);
            }
        }
    }

    
}
