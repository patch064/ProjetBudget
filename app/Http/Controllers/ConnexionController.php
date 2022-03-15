<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InscriptionRequest;

class ConnexionController extends Controller
{
    public function formulaire()
    {
        return view('Inscription/inscription');
    }

    public function traitement()
    {
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        return 'Traitement formulaire connexion';

    }
}
