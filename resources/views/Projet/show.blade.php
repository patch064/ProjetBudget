<x-app-layout>

<div class="card">
            <header class="card-header">
                <p class="title"><strong>Vue du projet :</strong></p>
            </header>
            <div class="card-content">
                <div class="content">
                    <hr>
                    <form action="{{ route('projet.financer', $projets->id) }}" method="post">
                        @method('PUT')
                        @csrf
                    <p><strong>Libelle du projet :</strong>{{ $projets->libelle }}</p>
                    <p><strong>Coût :</strong>{{ $projets->cout }} </p>
                    <p><strong>Description :</strong>{{ $projets->description }} </p>
                    <input class="input" id="depense" type="number" name="depense" max="{{$BudgetDispo[0]->somme}}"/>
                    <br><br>
                    <button class="button is-info" type="submit" >Enchérir</button>
                    </form>
                </div>
            </div>
            <footer class="card-footer is-centered">
                <a class="button is-info" href="{{ route('projet.index') }}">Retour à la liste</a>
        </footer>
        </div>
</x-app-layout>
