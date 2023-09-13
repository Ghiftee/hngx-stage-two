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
            $person = Person::create([
                'name' => $request->input('name'),
            ]);
            return response()->json($person, 201);
        } catch(\Exception $e){
            if  ($e instanceof \Illuminate\Database\QueryException && $e->errorInfo[1] == 1062){
                return response()->json(['message' => 'Person with the same name already exists'], 409);
            }
        }
    }

    public function read($id){
        $person = Person::find($id);
        if(!$person){
            return response()->json(['message' => 'Person not found'], 404);
        }

        return response()->json($person, 200);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string'
        ]);

        $person = Person::find($id);

        if (!$person){
            return response()->json(['message' => 'Person not found'], 404);
        }

        $person->name = $request->input('name');
        $person->save();

        return response()->json($person, 200);
    }

    public function delete($id){
        $person = Person::find($id);

        if (!$person){
            return response()->json(['message' => 'Person not found'], 404);
        }

        $person->delete();

        return response()->json(null, 204);
    }

}
