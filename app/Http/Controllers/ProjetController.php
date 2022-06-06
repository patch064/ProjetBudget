<?php

namespace App\Http\Controllers;

use App\Http\Requests\OperationDRequest;
use App\Models\Budget;
use App\Models\OperationsBudgets;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Facade\FlareClient\Context\RequestContext;
use Illuminate\Http\Request;
use App\Models\Projet;
use App\Http\Requests\ProjetRequest;
use Illuminate\Support\Facades\DB;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $auth_id=auth()->user()->id;

        $projet=Projet::where('user_id',$auth_id)->get();

        $budget=Budget::where('user_id',$auth_id)->first();
        //dd($budget);
        $operationBudgets=OperationsBudgets::where('budget_id',$budget->id)->orderBy('id','desc')->limit(12)->get();
        //dd($operationBudgets[1]);
        return view('Budget/index',[
            'budget'=>$budget,
            'projet'=>$projet,
            'operationBudgets'=>$operationBudgets
        ]
        );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Projet/create');
      //var_dump($BudgetDispo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjetRequest  $request)
    {
        $userid=auth()->user()->id;
        //$monBudget = Budget::where('user_id',$userid)->first();
       //dd($request);

            $validated=$request->validated();
            $result=array_merge($validated,['user_id'=>$userid]);
            Projet::create($result);
            return redirect()->route('projet.index')->with('info','Le Projet ' . $request->libelle . ' a été créée');
    }

    public function finance(OperationDRequest $request, $projet)
    {

        $userid = auth()->user()->id;
        $monProjet = Projet::find($projet);
        $monBudget = Budget::where('user_id', $userid)->first();

        $monProjet->update(['cout' => $monProjet->cout - $request['depense']]);
        $monBudget->update(['somme' => $monBudget->somme - $request['depense']]);
        $paramOpe = [
            'budget_id' => $monBudget->id,
            'operations' => $request['depense'],
            'type_operation' => 0
        ];

        if ($request['depense'] < $monProjet->cout) {

            OperationsBudgets::create($paramOpe);

            //dd($monProjet);
        }
            return redirect()->route('projet.index')->with('info', "Vous avez financé pour " . $request['depense'] . " €");

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $projetsid)
    {
        $projets=Projet::find($projetsid); //on recupere toutes les lignes de la table
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
