@extends('layouts.master')

@section('content')

    @include('layouts.hero', [
    'heroTitle' => 'Happy Living',
    'heroSubtitle' => 'Make living great again',
    'heroImage' => '/images/home_img.jpg',
    'heroImageTitle' => 'Happy Lifing'
])

    <section class="container-lg mt-5">
        <h2>"How we live is what makes us real!"</h2>
        <h4>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet
            clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit a</h4>
        <div class="row align-items-start">
            <div class="col-sm col-xs-12 m-2 float-box">
                <h2 class="m-2">Finanzen</h2>
                <img height="100%" width="100%" src="/images/img_finance.jpg">
            </div>
            <div class="col-sm col-xs-12 m-2 float-box">
                <h2 class="m-2">Putzplan</h2>
                <img height="100%" width="100%" src="/images/img_clean.jpg">
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-sm col-xs-12 m-2 float-box">
                <h2 class="m-2">Chat</h2>
                <img height="100%" width="100%" src="/images/img_phone.jpg">
            </div>
            <div class="col-sm col-xs-12 m-2 float-box">
                <h2 class="m-2">Einkaufsliste</h2>
                <img height="100%" width="100%" src="/images/img_shopping.jpg">
            </div>
        </div>
    </section>

@endsection
