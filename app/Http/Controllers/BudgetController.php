<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\Budget;
use App\Http\Requests\BudgetRequest;

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
        //dd($auth_id);
        $budget=Budget::where('user_id',$auth_id)->get();
        return view('Budget/index',compact('budget'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Budget/create');
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

        $budgets->save();
        return redirect()->route('budget.index')->with('info','Le Budget ' . $budgets->libelle . ' a été créée');
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
        return redirect()->route('budget.index')->with('info', 'Le Budget a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Budget $budget) {
        $budget->delete();
        return redirect()->route('budget.index')->with('info', 'Le Budget a bien été suprimée');
    }
    public function __construct ()
    {
        $this-> middleware('auth')->only('edit','destroy','create');
    }
}



