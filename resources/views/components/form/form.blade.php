<div class="w-full max-w-xl p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold text-gray-900">
        {{ $nombre }}
    </h2>
    @if ($errors->any())
        <div class="alert alert-danger text-red-500"">
            <h4>Errores:</h4>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="mt-8 space-y-6" action="{{ $ruta }}" method="post" enctype="multipart/form-data">
        @csrf
        @if ($metodo === 'put')
            @method('PUT')
        @endif
        {{ $slot }}
    </form>
</div>