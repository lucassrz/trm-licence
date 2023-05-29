<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('other.add_status') }}
        </h2>
    </x-slot>

    <div class="w-3/4 pt-4 mx-auto mt-4">
        <form action="{{ route('status/create') }}" method="POST">
            @csrf
            <div class="w-3/4 mx-auto">
                <div class="input-group flex flex-col items-center justify-center w-full mb-4 rounded">
                    <input type="text" name="libelle" class="form-control flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none mx-auto mb-3" placeholder="Libelle">
                    <input type="number" name="value" class="form-control flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none mx-auto mb-3" placeholder="Valeur">

                    <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mt-4 w-48" id="basic-addon2">{{ __('other.add') }}</button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
