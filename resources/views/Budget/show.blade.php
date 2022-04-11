<x-app-layout>

<div class="card">
            <header class="card-header">
                <p class="title"><strong>Vue du budget :</strong></p>
            </header>
            <div class="card-content">
                <div class="content">
                    <hr>

                    <p><strong>libelle budget :</strong>{{ $budgets->libelle }}</p>
                    <p><strong>somme :</strong>{{ $budgets->somme }} </p>

                </div>
            </div>
            <footer class="card-footer is-centered">
            <a class="button is-info" href="{{ route('projet.index') }}">Retour à la liste</a>
        </footer>
        </div>
</x-app-layout>
