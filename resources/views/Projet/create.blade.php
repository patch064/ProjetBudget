<x-app-layout>

<div class="card">
    <header class="card-header">
        <p class="card-header-title">Création d'un projet</p>
    </header>
    <div class="card-content">
        <div class="content">
            <form action="{{ route('projet.store') }}" method="POST">
                @csrf
                <div class="field">
                    <label class="label">libelle</label>
                    <div class="control">
                        <input class="input" name="libelle" value="{{ old('libelle') }}">
                    </div>
                    @error('libelle')
                    <p class="help is-danger">Le nom du projets est incorrect</p>
                    @enderror
                </div>
                    <div class="field">
                    <label class="label">cout du projets</label>
                    <div class="control">
                        <input class="input" type="numeric" name="cout" value="{{ old('cout') }}">
                    </div>
                    @error('cout')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="field">
                    <label class="label">Description</label>
                    <div class="control">
                        <input class="input" name="description" value="{{ old('description') }}">
                    </div>
                    @error('libelle')
                    <p class="help is-danger">Le nom du projets est incorrect</p>
                    @enderror
                </div>


                <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>

                <div class="field">
                    <div class="control">
                        <button class="button is-link">Envoyer</button>
                        <a class="button is-info" href="{{ route('projet.index') }}">Retour à la liste</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</x-app-layout>
