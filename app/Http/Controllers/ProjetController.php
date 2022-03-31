<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\Projet;
use App\Http\Requests\ProjetRequest;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projet=Projet::orderBy('id', 'ASC')->get();
        return view('Projet/index',compact('projet'));
    }
    //public function btn()
    //{
    //    return redirect('budget');
    //}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Projet/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjetRequest  $request, Projet $projets)
    {
        $projets->libelle=$request->libelle;
        $projets->cout=$request->cout;
        $projets->description=$request->description;
        $projets->save();
        return redirect()->route('projet.index')->with('info','Le Projet ' . $projets->libelle . ' a été créée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($projetsid)
    {
        $projets=Projet::table($projetsid)//on recupere toutes les lignes de la table
            ->join('users', 'projets.user_id', '=', 'users.id')
            ->select('projets.libelle'/*, 'projet.cout', 'description'*/)
            ->where('users.id','=',$projetsid->user_id)
            ->get();
        return view('Projet/show', compact('projets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($projetsid)
    {
        $projets=Projet::find($projetsid); //on recupere toutes les lignes de la table

        return view('Projet/edit', compact('projets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjetRequest $request, Projet $projet) {
        $projet->update($request->all());
        return redirect()->route('projet.index')->with('info', 'Le Projet a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projet $projet) {
        $projet->delete();
        return redirect()->route('projet.index')->with('info', 'Le projet a bien été suprimée');
    }
}
