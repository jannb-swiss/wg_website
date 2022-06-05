@extends('layouts.master')

@section('content')

    @include('layouts.hero', [
    'heroTitle' => 'WG Website',
    'heroSubtitle' => 'Zusammen Leben',
    'heroImage' => '/images/img_sofa.jpg',
    'heroImageTitle' => 'WG-Website'
])

    <section class="container-lg mt-5 section">
        <div class="alert alert-danger text-center">
            <h1 class="">404</h1>
            <h3 class="">Etwas ging schief! :(</h3>
            <h4 class="">Kehre zur Homepage zurück <a href="/">Home</a></h4>
        </div>
    </section>

@endsection
