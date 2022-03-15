@extends('layouts.master')

@section('content')

    @include('layouts.hero', [
    'heroTitle' => 'Happy Living',
    'heroSubtitle' => 'Make living great again',
    'heroImage' => '/images/home_img.jpg',
    'heroImageTitle' => 'Happy Lifing'
])

    <section class="container-lg mt-5">
        <h2>Who am I?</h2>
    </section>

@endsection
