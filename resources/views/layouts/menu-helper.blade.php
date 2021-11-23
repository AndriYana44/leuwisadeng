<div class="navbar-helper">
    <div class="nav-menu">
        <ul class="menu-wrapper">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
            @foreach (parentMenu() as $item)
            <li>
                @if($item->is_single > 0)
                <a href="{{ url('') }}/landing/page/{{ $item->url }}">{{ strtoupper($item->name) }}</a>
                @else
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ strtoupper($item->name) }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        @foreach ($item->child as $val)
                            <li><a class="dropdown-item" href="{{ url('') }}/landing/pages/{{ $val->url }}">{{ strtoupper($val->name) }}</a></li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </li>
            @endforeach
            @foreach (linkMenu() as $item)
                <li><a href="{{ url('') }}/landing/page/{{ $item->url }}">{{ strtoupper($item->name) }}</a></li>
            @endforeach
        </ul>
    </div>
</div>