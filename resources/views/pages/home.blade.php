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

        <div class="float-box row mb-2">
            <div class="col-sm col-xs-12 text-center mt-2">
                <div>
                    <h3><i class="bi bi-house"></i> für WGs</h3>
                    <h6 class="text-align-left">Happy Living hilf dir und deinen Mitbewohnern struktur in den WG Altag zu bringen. Teilt euch die Kosten auf und
                    erstellt einen Putzplan</h6>
                </div>
            </div>
            <div class="col-sm col-xs-12 text-center mt-2">
                <div>
                    <h3><i class="bi bi-people"></i> für Familien</h3>
                    <H6 class="text-align-left">Strukturiere euren Altag damit die ganze Famile an einem Strang ziet. Teilt euch die Ämtlei auf so das
                    jeder dem Haushalt von Nutzen ist.</H6>
                </div>
            </div>
            <div class="col-sm col-xs-12 text-center mt-2">
                <div class="col-sm-12">
                    <h3><i class="bi bi-balloon-heart"></i> für Paare</h3>
                    <h6 class="text-align-left">Wir helfen euch das eure Bezihung nicht schon nach zewi Wochen zusammen Wohnen in die Brüche geht.
                    Teilt schön auf wer was Zahlt und nicht eure Liebe.</h6>
                </div>
            </div>
        </div>

        <div class="row align-items-start">
            <div class="col-sm col-xs-12 m-2 float-box">
                <div class="m-2">
                    <h2 class="">Finanzen</h2>
                    <div class="row">
                        <div class="col-md-8 col-xs-12 ml-2">
                            <h5 class="">Krieg deine Finanzen in den Griff</h5>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <a href="/finance" class="href-box">Mehr lesen<i class="icon-box bi bi-caret-right"></i></a>
                        </div>
                    </div>
                </div>
                <img height="100%" width="100%" src="/images/img_finance.jpg">
            </div>
            <div class="col-sm col-xs-12 m-2 float-box">
                <div class="m-2">
                    <h2 class="">Putzplan</h2>
                    <div class="row">
                        <div class="col-md-8 col-xs-12">
                            <h5 class="">Krieg deine Finanzen in den Griff</h5>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <a href="/clean" class="href-box">Mehr lesen<i class="icon-box bi bi-caret-right"></i></a>
                        </div>
                    </div>
                </div>
                <img height="100%" width="100%" src="/images/img_clean.jpg">
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-sm col-xs-12 m-2 float-box">
                <div class="m-2">
                    <h2 class="">Chat</h2>
                    <div class="row">
                        <div class="col-md-8 col-xs-12">
                            <h5 class="">Krieg deine Finanzen in den Griff</h5>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <a href="chat" class="href-box">Mehr lesen<i class="icon-box bi bi-caret-right"></i></a>
                        </div>
                    </div>
                </div>
                <img height="100%" width="100%" src="/images/img_phone.jpg">
            </div>
            <div class="col-sm col-xs-12 m-2 float-box">
                <div class="m-2">
                    <h2 class="">Einkaufsliste</h2>
                    <div class="row">
                        <div class="col-md-8 col-xs-12">
                            <h5 class="">Krieg deine Finanzen in den Griff</h5>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <a href="shopping" class="href-box">Mehr lesen<i class="icon-box bi bi-caret-right"></i></a>
                        </div>
                    </div>
                </div>
                <img height="100%" width="100%" src="/images/img_shopping.jpg">
            </div>
        </div>
    </section>

@endsection
