<form action="{{ route($route, [$course, $student ?? null]) }}" method="POST">
    @csrf
    <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-800">
        {{ $label }}
    </button>
</form>