@if (!empty($breadcrumbs))
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            @foreach ($breadcrumbs as $breadcrumb)
                @if ($loop->last)
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $breadcrumb['title'] }}</li>
                @else
                    <li class="breadcrumb-item"><a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['title'] }}</a></li>
                @endif
            @endforeach
        </ol>
    </div>
@endif
