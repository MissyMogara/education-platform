<div>
    <label class="block mb-2 text-sm font-medium text-gray-900">{{ $label }}</label>
    <input type="{{ $tipo }}" name="{{ $nombre }}" id="{{ $nombre }}"
           value="{{ old($nombre) ?? $valor ?? '' }}"
           {{ $required ?? '' }}
           @if ($tipo === "time")
               step="1"
           @endif
           class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
</div>