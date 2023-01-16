<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Vérifier votre adresse email grâce au lieu de vérification que vous avez reçu. Si vous n\'avez pas reçu de mail, cliquez sur le bouton ci-dessous.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Un lien de vérification de compte a été envoyé à l\'adresse mail indiquée.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Renvoyer l\'email de vérification') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Déconnexion') }}
            </button>
        </form>
    </div>
</x-guest-layout>
