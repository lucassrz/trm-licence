<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('other.add_groupe') }}
        </h2>
    </x-slot>

    <div class="w-3/4 pt-4 mx-auto mt-4">
        <form action="{{ route('groupes/create') }}" method="POST">
            @csrf
            <div class="w-3/4 mx-auto">
                <div class="input-group flex flex-col items-center justify-center w-full mb-4 rounded">
                    @if(!empty($matieres))
                        <select name="matiere" id="select-matieres" class="form-control min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none mb-3">
                            <option value="">Ajouter une matiere au groupe</option>
                            @foreach ($matieres as $matiere)
                                <option value="<?= $matiere->id ?>"><?= $matiere->libelle ?></option>
                            @endforeach
                        </select>
                    @endif

                    @if(!empty($enseignants))
                        <select name="enseignant" id="select-enseignant" class="form-control min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none mb-3">
                            <option value="">Ajouter un enseignant  au groupe</option>
                            @foreach ($enseignants as $enseignant)
                                <option value="<?= $enseignant->id ?>"><?= $enseignant->nom ?></option>
                            @endforeach
                        </select>
                    @endif

                    <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mt-4 w-48" id="basic-addon2">{{ __('other.add') }}</button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>