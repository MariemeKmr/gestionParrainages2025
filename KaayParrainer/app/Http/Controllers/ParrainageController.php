<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParrainageController extends Controller {
    public function parrainer() {
        return view('Utilisateurs.Parrainage');
    }
}
