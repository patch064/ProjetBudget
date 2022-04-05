<x-app-layout>

<div class="card">
    <header class="card-header">
        <p class="card-header-title">Modification d'un budget</p>
    </header>
    <div class="card-content">
        <div class="content">
            <form class="form-horizontal" method="POST" action="{{ route('budget.update', $budgets->id) }}">
                {{ csrf_field() }}

                {{ method_field('PUT') }}

                <div class="field">
                    <label for="nombudget" class="label">libelle</label>
                    <input type="text" name="libelle" value="{{ old('libelle',$budgets->libelle) }}" >
                    @error('libelle')
                    <div class="invalid-feedback">Une reponse est attendu</div>
                    @enderror
                </div>
                <div class="field">
                    <label for="somme" class="label">somme</label>
                    <div class="control">
                        <input type="numeric"   name="somme" value="{{ old('somme',$budgets->somme) }}" required>
                    </div>
                    @error('somme')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>
                <div class="field">
                    <div class="control">
                        <button class="button is-link">Enregistrer</button>
                        <a class="button is-info" href="{{ route('projet.index') }}">Retour à la liste</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</x-app-layout>
