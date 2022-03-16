<x-app-layout>

<div class="card">
    <header class="card-header">
        <p class="card-header-title">Modification d'un projet</p>
    </header>
    <div class="card-content">
        <div class="content">
            <form class="form-horizontal" method="POST" action="{{ route('projet.update', $projets->id) }}">
                {{ csrf_field() }}

                {{ method_field('PUT') }}

                <div class="field">
                    <label for="nomprojets" class="label">libelle</label>
                    <input type="text" name="libelle" value="{{ old('libelle',$projets->libelle) }}" >
                    @error('libelle')
                    <div class="invalid-feedback">Une reponse est attendu</div>
                    @enderror
                </div>
                <div class="field">
                    <label for="somme" class="label">cout</label>
                    <div class="control">
                        <input type="numeric"   name="cout" value="{{ old('cout',$projets->cout) }}" required>
                    </div>
                    @error('cout')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="field">
                    <label for="description" class="label">Description</label>
                    <div class="control">
                        <input type="text"   name="description" value="{{ old('description',$projets->description) }}" required>
                    </div>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>
                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-link">Enregistrer</button>
                        <a class="button is-info" href="{{ route('projet.index') }}">Retour à la liste</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</x-app-layout>
