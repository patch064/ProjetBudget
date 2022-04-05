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
        @php
// $jesuis = \Illuminate\Support\Facades\Auth::user()->id;
//
/* avant de lancer "php artisan db:seed" , il faut lancer
        1- php artisan db:wipe
        2- php artisan migrate
        3-php artisan db:seed */
        @endphp
        <p class="card-header-title">Projet</p>

        <a class="button is-info" href="{{ route('projet.create') }}">Créer un projet</a>
    </header>
    <div class="card-content">


            <table class="table is-hoverable" >
                <thead>
                    <tr>
                        <th>Libelle</th>
                        <th>Cout</th>
                        <th>Description</th>
                </thead>
                <body class="has-background-black">

                    @foreach($projet as $projets)
                    <tr>
                        <td><strong>{{ $projets->libelle }}</strong></td>
                        <td><strong>{{ $projets->cout }}</strong></td>
                        <td><strong>{{ $projets->description }}</strong></td>

                        <td><a class="button is-primary" href="{{ route('projet.show', $projets->id) }}">Voir</a></td>
                        <td><a class="button is-warning" href="{{ route('projet.edit', $projets->id) }}">Modifier</a></td>
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

        <footer class="card-footer">
            <a class="button is-info" href="{{ route('budget.index') }}">Budget</a>

        </footer>
</div>
    <br><br>  <br><br>  <br><br>  <br><br>  <br><br>

    <div class="card" style="width:100%">
        <header class="card-header">
            <p class="card-header-title">Explication</p></header>
        <div class="card-content">
            <table class="table is-hoverable" >
                <thead>
                Voici vos projets, utiliser l'argent mit dans le porte monnaie pour créer vos projets.
                </thead></table></div></div>
</x-app-layout>
