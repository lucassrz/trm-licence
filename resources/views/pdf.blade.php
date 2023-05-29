<x-app-layout>
    
        <form action="{{ url('pdf') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name='pdf' />
            <button type="submit">Envoyer</button>
        </form>

</x-app-layout>