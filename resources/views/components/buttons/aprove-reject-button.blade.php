<div>
    <form action="{{ route($route, $id) }}" method="POST" onsubmit="return confirm('{{ $message }}');">
        @csrf
        @method('PUT')
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">
            {{ $label }}
        </button>
    </form>    
</div>