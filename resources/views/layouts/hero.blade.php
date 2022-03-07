@if (!empty($heroImage))
    <div class="hero">
        <div class="container hero-overlay">
            <h1 class="">{{ $heroTitle }}</h1>

            @if (!empty($heroSubtitle))
                <h2>{!! $heroSubtitle !!}</h2>
            @endif

        </div>
        {{--<img src="'{{ $heroImage }}'" class="hero-img">--}}
        <div class="hero-img" style="background-image: url('{{ $heroImage }}')" title="{{ $heroImageTitle }}"></div>
    </div>

@endif
