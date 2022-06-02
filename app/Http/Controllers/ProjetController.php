<?php

namespace App\Http\Controllers;

use App\Models\Budget;
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
        //dd($auth_id);
        $projet=Projet::where('user_id',$auth_id)->get();

        $budget=Budget::where('user_id',$auth_id)->get();
        return view('Budget/index',compact('budget','projet'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $auth_id=auth()->user()->id;
        //dd($auth_id);
        $projet=Projet::where('user_id',$auth_id)->get();

        $BudgetDispo=DB::table('budgets')->join('users', 'budgets.user_id','=','users.id')->
        select('budgets.somme')->where('users.id','=',auth()->user()->id)->get();

        return view('Projet/create');


        var_dump($BudgetDispo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjetRequest  $request, Projet $projets)
    {

        $BudgetDispo=DB::table('budgets')->join('users', 'budgets.user_id','=','users.id')->
            select('budgets.somme')->where('users.id','=',auth()->user()->id)->get();

        var_dump($BudgetDispo);
        if($projets->cout<$BudgetDispo)
        {
            $projets->libelle=$request->libelle;
            $projets->cout=$request->cout;
            $projets->description=$request->description;
            $projets->user_id=$request->user_id;

            $projets->save();
            return redirect()->route('budget.index')->with('info','Le Projet ' . $projets->libelle . ' a été créée');
        }        else{
            return  view('Projet/create')->with('info','Le Projet ' . $projets->libelle . 'ne peut pas etre créée');
        }


    }
    public function finance(Request $request, $projet)
    {

        $BudgetDispo=DB::table('budgets')->join('users', 'budgets.user_id','=','users.id')->
        select('budgets.somme')->where('users.id','=',auth()->user()->id)->get();

        /*$depense = $_POST['depense'];
        $Perdu=$BudgetDispo[0]->somme-$depense;*/
        $monProjet = Projet::find($projet);
        $monBudget = Budget::where('user_id',auth()->user()->id)->first();

        $monProjet->update(['cout'=>$monProjet->cout-$request['depense']]);
        $monBudget->update(['somme'=>$monBudget->somme-$request['depense']]);
        /*DB::table('projets')
            ->where('projets.id',$projet->id)
            ->update(['cout' => $projet->cout-$depense]);
*/
       /* DB::table('budgets')
            ->where('budgets.id',auth()->user()->id)
            ->update(['somme' => $Perdu]);*/


              return redirect()->route('budget.index')-> with('info',"Vous avez financé pour ". $request['depense'] ." €");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $projetsid)
    {

        $BudgetDispo=DB::table('budgets')->join('users', 'budgets.user_id','=','users.id')->
        select('budgets.somme')->where('users.id','=',auth()->user()->id)->get();


        $projets=Projet::find($projetsid); //on recupere toutes les lignes de la table

        return view('Projet/show', compact('projets','BudgetDispo'));
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

      return redirect()->route('budget.index')->with('info', 'Le Projet a bien été modifiée');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projet $projet) {
        $projet->delete();
        return redirect()->route('budget.index')->with('info', 'Le projet a bien été suprimée');
    }
}
