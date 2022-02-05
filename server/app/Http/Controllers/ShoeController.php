<?php

namespace App\Http\Controllers;

use App\Models\shoe;
use Illuminate\Http\Request;

class ShoeController extends Controller
{
    public function shoes(){
        return shoe::orderBy("uscita","ASC")->get();
    }

    public function shoe($id){
        return shoe::findOrFail($id);
    }

    public function addshoe(Request $request){
        $shoeData = json_decode($request->getContent());
        $newShoe = new shoe();
        $newShoe -> nome = $shoeData->nome;
        $newShoe -> brand = $shoeData->brand;
        $newShoe -> numero = $shoeData->numero;
        $newShoe -> prezzo = $shoeData->prezzo;
        $newShoe -> uscita = $shoeData->uscita;
        $newShoe -> save();
        return $newShoe;

    }

    public function edit(Request $request, $id){
        $shoeData = json_decode($request->getContent());
        $shoe = shoe::find($id);
        $shoe->nome = $shoeData->language;
        $shoe->brand = $shoeData->icon;
        $shoe->numero = $shoeData->company;
        $shoe->prezzo = $shoeData->RAL;
        $shoe->uscita = $shoeData->level;
        $shoe->save();
        return $shoe;
    }

    public function delete($id){
        $shoe = shoe::destroy($id);
        return $shoe;
    }
}
