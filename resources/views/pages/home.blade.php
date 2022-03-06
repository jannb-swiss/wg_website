@extends('layouts.master')

@section('content')

    @include('layouts.hero', [
    'heroTitle' => 'Happy Living',
    'heroSubtitle' => 'Make living great again',
    'heroImage' => "{{ asset('/images/home_img.jpg') }}",
    'heroImageTitle' => 'Poolside – taking students to business'
])

    <section class="container-xl">
        <div class="">
            <p class="test-color">This is a test</p>
        </div>
    </section>

@endsection
