<x-app-layout>

<div class="card">
    <header class="card-header">
        <p class="card-header-title">Création d'un budget</p>
    </header>
    <div class="card-content">
        <div class="content">
            <form action="{{ route('budget.store') }}" method="POST">
                @csrf
                <div class="field">
                    <label class="label">libelle</label>
                    <div class="control">
                        <input class="input" name="libelle" value="{{ old('libelle') }}">
                    </div>
                    @error('libelle')
                    <p class="help is-danger">Le nom de la questions est incorrect</p>
                    @enderror
                </div>
                    <div class="field">
                    <label class="label">somme</label>
                    <div class="control">
                        <input class="input" type="numeric" name="somme" value="{{ old('somme') }}">
                    </div>
                    @error('somme')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="field">
                    <div class="control">
                        <button class="button is-link">Envoyer</button>
                        <a class="button is-info" href="{{ route('budget.index') }}">Retour à la liste</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</x-app-layout>
