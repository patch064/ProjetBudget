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

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">Budget</p>

                </header>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>

                            <th>Libelle</th>
                            <th>Somme</th>
                            </thead>
                            <tbody>

                            <tr>
                                <td><strong>{{$budget->libelle }}</strong></td>
                                <td><strong>{{$budget->somme }}</strong></td>
                                <td><a class="btn btn-warning"
                                       href="{{ route('budget.edit', $budget->id) }}">Modifier</a></td>

                                <td>
                                    <form action="{{ route('budget.gain', $budget->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <a class="btn btn-success " data-bs-toggle="modal"
                                           data-bs-target="#gainModal">opérations</a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="gainModal" tabindex="-1"
                                             aria-labelledby="exampleModalLabel"
                                             aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Opération</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="operation" class="col-form-label"></label>
                                                            <input class="input" id="operation" type="number"
                                                                   name="gain" aria-valuemin="0" min="0">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">
                                                            Annuler
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">Valider</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">

            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">Historique (12 dernières opérartions)</p>

                </header>
                <div class="card-content">
                    <div style="height: 300px; overflow-y:auto ">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>


                                @foreach($operationBudgets as $operation)
                                    <tr>
                                        <td><strong>{{$operation->type_operation==0?'-':'+'}}</strong></td>
                                        <td><strong>{{$operation->operations}}</strong></td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6">
        <div class="card" style="width:100%">

            @php
                // $jesuis = \Illuminate\Support\Facades\Auth::user()->id;
                //
                /* avant de lancer "php artisan db:seed" , il faut lancer
                        1- php artisan db:wipe
                        2- php artisan migrate
                        3-php artisan db:seed */
            @endphp
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">Projets</p>

                </header>

            <div class="card-content">
                <div class="col-2 justify-content-md-end mb-3">
                    <a class="btn btn-primary" href="{{ route('projet.create') }}">Créer un projet</a>
                </div>

                <div class="table-responsive">
                    <table class="table is-hoverable">
                        <thead>
                        <tr>

                            <th>Libelle</th>
                            <th>Cout</th>
                        </tr>
                        </thead>
                        <body class="has-background-black">

                        @foreach($projet as $projets)

                            <tr>

                                <td><strong>{{ $projets->libelle }}</strong></td>
                                <td><strong>{{ $projets->cout }}</strong></td>


                                <td><a class="btn btn-primary" href="{{ route('projet.show', $projets->id) }}">Voir</a>
                                </td>
                                <td><a class="btn btn-warning"
                                       href="{{ route('projet.edit', $projets->id) }}">Modifier</a></td>
                                <td>
                                    <form action="{{ route('projet.finance', $projets->id) }}" method="post">
                                        @csrf
                                        @method('PUT')

                                        <a class="btn btn-success " data-bs-toggle="modal"
                                           data-bs-target="#depenseModal">opérations</a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="depenseModal" tabindex="-1"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Opération</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="operation" class="col-form-label"></label>
                                                            <input class="input" id="operation" type="number"
                                                                   name="depense"/>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Annuler
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">Valider</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td>

                                <td>
                                    <form action="{{ route('projet.destroy', $projets->id) }}" method="post">
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
        </div>
    </div>
</x-app-layout>
