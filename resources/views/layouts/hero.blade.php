@if (!empty($heroImage))
    <div class="jumbotron hero">
        <div class="container hero-overlay">
            <h1 class="hero-title">{{ $heroTitle }}</h1>

            @if (!empty($heroSubtitle))
                <h2>{!! $heroSubtitle !!}</h2>
            @endif

        </div>
        <div class="hero-img" style="background-image: url('{{ $heroImage }}')" title="{{ $heroImageTitle }}"></div>
    </div>

@endif
