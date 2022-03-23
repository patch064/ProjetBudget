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

<div class="card" style="width:100%">
    <header class="card-header">
        <p class="card-header-title">Budgets</p>

        <!--<a class="button is-info" href="{{ route('budget.create') }}">Créer un budgets</a>-->
    </header>
    <div class="card-content">


            <table class="table is-hoverable" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Libelle</th>
                        <th>Somme</th>
                </thead>
                <tbody>

                    @foreach($budget as $budgets)
                    <tr>
                        <td>{{ $budgets->id }}</td>
                        <td><strong>{{ $budgets->libelle }}</strong></td>
                        <td><strong>{{ $budgets->somme }}</strong></td>

                        <td><a class="button is-primary" href="{{ route('budget.show', $budgets->id) }}">Voir</a></td>
                        <td><a class="button is-warning" href="{{ route('budget.edit', $budgets->id) }}">Modifier</a></td>
                        <td>
                            <!--<form action="{{ route('budget.destroy', $budgets->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="button is-danger" type="submit">Supprimer</button>-->
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

    </div>
    <footer class="card-footer">

        <a class="button is-info" href="{{ route('projet.index') }}">Projet</a>
    </footer>
</div>

</x-app-layout>
