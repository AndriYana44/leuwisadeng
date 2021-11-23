
<div class="navbar">
    <div class="nav-brand">
        <a href="{{ url('/') }}" style="display: flex; align-items:center; text-decoration:none; color:#555;">
            <img src="{{ asset('img/logo-kab-bogor.png') }}" alt="logo" width="100">
            <h6>KECAMATAN LEUWISADENG <br> KABUPATEN BOGOR</h6>
        </a>
    </div>
    <div class="nav-menu">
        <ul class="menu-wrapper">
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