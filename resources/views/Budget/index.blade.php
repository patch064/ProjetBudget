<x-app-layout>
    <style>
        .card-footer {
            justify-content: center;
            align-items: center;
            padding: 0.4em;
        }
        select, .is-info {
            margin: 0.3em;
        }
    </style>



    @if(session()->has('info'))
        <div class="notification is-success">
            {{ session('info') }}
        </div>
    @endif


    <div class="card" style="width:25%">
        <header class="card-header">
            <p class="card-header-title">Budgets</p>

        </header>
        <div class="card-content">

            <table class="table is-hoverable" >
                <thead>

                <th>Libelle</th>
                <th>Somme</th>
                </thead>
                <tbody>


                @foreach($budget as $budgets)
                    <tr>
                        <td><strong>{{$budgets->libelle }}</strong></td>
                        <td><strong>{{$budgets->somme }}</strong></td>
                        <td><a class="btn btn-warning" href="{{ route('budget.edit', $budgets->id) }}">Modifier</a></td>

                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
    </div>
    <br><br>  <br><br>  <br><br>  <br><br>  <br><br>

    <div>
    <div class="card" style="width:100%">

            @php
                // $jesuis = \Illuminate\Support\Facades\Auth::user()->id;
                //
                /* avant de lancer "php artisan db:seed" , il faut lancer
                        1- php artisan db:wipe
                        2- php artisan migrate
                        3-php artisan db:seed */
            @endphp
            <div class="row">
                <div class="col-md-auto">

                <p class="card-header-title">Projet </p>
                </div>
                <div class="col-2 justify-content-md-end">
                <a class="btn btn-primary" href="{{ route('projet.create') }}">Créer un projet</a>
                </div>

            </div>

        <div class="card-content">


            <table class="table is-hoverable" >
                <thead>
                <tr>

                    <th>Libelle</th>
                    <th>Cout</th>
                   <!-- <th>Description</th>-->
                </thead>
                <body class="has-background-black">

                @foreach($projet as $projets)

                    <tr>

                        <td><strong>{{ $projets->libelle }}</strong></td>
                        <td><strong>{{ $projets->cout }}</strong></td>
                        <!--<td><strong>{{ $projets->description }}</strong></td>-->

                        <td><a class="btn btn-primary" href="{{ route('projet.show', $projets->id) }}">Voir</a></td>
                        <td><a class="btn btn-warning" href="{{ route('projet.edit', $projets->id) }}">Modifier</a></td>
                        <td><a class="btn btn-success" href="{{ route('projet.finance', $projets->id) }}">+/-</a></td>
                        <td><form action="{{ route('projet.destroy', $projets->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="button is-danger" type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </body>
            </table>

        </div>
    </div>
   <!-- <div class="card" style="width:100%">
        <header class="card-header">
            <p class="card-header-title">Explication</p></header>
        <div class="card-content">
            <table class="table is-hoverable" >
                <thead>
                Ceci est votre porte monnaie, il se crée tout seul comme un grand lors de la création de votre compte, vous pouvez maintenant le remplir pour pouvoir créer vos projets.
                </thead></table></div></div>

-->
    </div>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
