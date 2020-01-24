<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Professional; 
use App\Technology;

class ProfessionalController extends Controller
{
    public function listProfessionals(Request $request){

        $listProfessionals = Professional::all();

        return response()->json($listProfessionals);

    }

    public function createProfessionals(Request $request){
        //pegando id de techologies do formulário
        $technologyId = $request->technology;

        //criando um novo profissional na tabela Professionals
        $newProfessional = new Professional();
        $newProfessional->name = $request->name;
        $newProfessional->github = $request->github;

        $result = $newProfessional->save();

        //pegando o id da tabela Technologies
        $technology = Technology::find($technologyId);

        //validação se existe o id de technology
        if($technology){ 
            $technology->professionals()->attach($newProfessional->id); //vem do Model Technology, há uma função de relacionamento. A partir dela é possível buscar informações da tabela Technologies e inserir coisas na tabela intermediária Professionals_has_Technologies.

        } else {
            return response()->json(["error"=>"O id não existe na tabela Technologies!"]); //montando um array de erro
        }


        return response()->json($newProfessional); //ao invés de true ou false do $result, vai retornar as informações do novo profissional 



    }
}
