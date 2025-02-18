<form action="{{ route($route, $id) }}" method="POST" onsubmit="return confirm('{{ $message }}');">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-700">
        {{ $label }}
    </button>
</form>
