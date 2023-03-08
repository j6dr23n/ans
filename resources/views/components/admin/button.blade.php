@props(['href','icon'])

<a href="{{ $href }}" class="text-blueGray-500 block py-1 px-3">
    <i class="fas fa-{{ $icon }}"></i>
</a>