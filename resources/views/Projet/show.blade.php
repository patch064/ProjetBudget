    @extends('template1')
    @section('contenu')
        <div class="card">
            <header class="card-header">
                <p class="title"><strong>Vue du projet :</strong></p>
            </header>
            <div class="card-content">
                <div class="content">
                    <hr>
                    <p><strong>Libelle du projet :</strong>{{ $projets->libelle }}</p>
                    <p><strong>Coût :</strong>{{ $projets->cout }} </p>
                    <p><strong>Description :</strong>{{ $projets->description }} </p>

                </div>
            </div>
            <footer class="card-footer is-centered">
                <a class="button is-info" href="{{ route('projet.index') }}">Retour à la liste</a>
        </footer>
        </div>
    @endsection
