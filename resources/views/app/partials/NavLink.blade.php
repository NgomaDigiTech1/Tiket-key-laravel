<li class=" {{ Request::url() === $route ? 'active' : '' }}">
    <a href="{{ $route }}">
        {{ $name }}
    </a>
</li>
