<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professional; 

class ProfessionalController extends Controller
{
    public function listProfessionals(Request $request){

        $listProfessionals = Professional::all();

        return response()->json($listProfessionals);

    }

    public function createProfessionals(Request $request){

        $newProfessional = new Professional();
        $newProfessional->name = $request->name;
        $newProfessional->github = $request->github;

        $result = $newProfessional->save();

        return response()->json($newProfessional); //ao invés de true ou false do $result, vai retornar as informações do novo profissional



    }
}
