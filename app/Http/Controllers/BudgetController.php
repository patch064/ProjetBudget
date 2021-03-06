<?php

namespace App\Http\Controllers;

use App\Http\Requests\OperationGRequest;
use App\Models\Projet;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\Budget;
use App\Http\Requests\BudgetRequest;
use App\Models\OperationsBudgets;


class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth_id=auth()->user()->id;


        $budget=Budget::where('user_id',$auth_id)->get();
        $projet=Projet::where('user_id',$auth_id)->get();

        return view('Budget/index',compact('budget','projet'));

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BudgetRequest  $request, Budget $budgets)
    {
        $budgets->libelle=$request->libelle;
        $budgets->somme=$request->somme;
        $budgets->user_id=auth()->user()->id;
        $budgets->user_id=$request->user_id;
        $budgets->save();
        return redirect()->route('projet.index')->with('info','Le Budget ' . $budgets->libelle . ' a été créée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $budgetsid)
    {
        $budgets=Budget::find($budgetsid); //on recupere toutes les lignes de la table

        return view('Budget/show', compact('budgets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($budgetsid)
    {
        $budgets=Budget::find($budgetsid); //on recupere toutes les lignes de la table
        return view('Budget/edit', compact('budgets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BudgetRequest $request, Budget $budget) {

        $budget->update($request->all());
        return redirect()->route('projet.index')->with('info', 'Le Budget a bien été modifiée');
    }

    public function Gain(OperationGRequest $request)
    {

        $userid = auth()->user()->id;
        $monBudget = Budget::where('user_id', $userid)->first();
        $monBudget->update(['somme' => $monBudget->somme + $request['gain']]);
        $paramOpe = [
            'budget_id' => $monBudget->id,
            'operations' => $request['gain'],
            'type_operation' => 1
        ];


            OperationsBudgets::create($paramOpe);

            //dd($monProjet);

        return redirect()->route('projet.index')->with('info', "Vous avez ajouté " . $request['gain'] . " €");

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function __construct ()
    {
        $this-> middleware('auth')->only('edit');
    }
}



