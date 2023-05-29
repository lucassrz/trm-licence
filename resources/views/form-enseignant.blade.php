<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('other.add_enseignant') }}
        </h2>
    </x-slot>

    <div class="w-3/4 pt-4 mx-auto mt-4">
        <form action="{{ route('enseignants/create') }}" method="POST">
            @csrf
            <div class="w-3/4 mx-auto">
                <div class="input-group flex flex-col items-center justify-center w-full mb-4 rounded">
                    <input type="text" name="name" class="form-control flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none mx-auto mb-3" placeholder="Nom">
                    <input type="text" name="firstname" class="form-control flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none mx-auto mb-3" placeholder="Prénom">

                    <select name="discipline" id="select-disciplines" class="form-control min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none mb-3">
                        <option value="">Choisir une discipline</option>
                        <option value="1">discpl1</option>
                        <option value="2">discpl2</option>
                        <option value="3">discpl3</option>
                        <option value="4">discpl4</option>
                        <option value="5">discpl5</option>
                        <option value="6">discpl6</option>
                    </select>

                    <select name="status" id="select-status" class="form-control min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none mb-3">
                        <option value="">Choisir un statut</option>
                        <option value="1">statut1</option>
                        <option value="2">statut2</option>
                        <option value="3">statut3</option>
                    </select>


                    <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mt-4 w-48" id="basic-addon2">{{ __('other.add') }}</button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
