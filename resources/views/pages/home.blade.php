@extends('layouts.master')

@section('content')

    @include('layouts.hero', [
    'heroTitle' => 'WG Website',
    'heroSubtitle' => 'Zusammen Leben',
    'heroImage' => '/images/img_sofa.jpg',
    'heroImageTitle' => 'WG-Website'
])

    <section class="container-lg mt-5 section me-2">

        <h2>"How we live is what makes us real!"</h2>
        <h4 class="mt-2 mb-2">Das WG-Leben ist schön, aber nicht immer leicht. WG-Website hilft euch bei der Organisation von allem was im Haushalt so zu erledigen ist. Damit mehr Energie und Zeit für die wichtigen Dinge bleibt. <a href="/register" class="href-box">Jetzt registrieren!<i class="icon-box bi bi-caret-right"></i></a></h4>

        <div class="float-box row mb-1 margin-for-box">
            <div class="col-sm col-xs-12 text-center mt-2">
                <div>
                    <h3><i class="bi bi-house"></i> für WGs</h3>
                    <h6 class="text-align-left">Fokussiert euch auf den Teil des Zusammenlebens der Spass macht. Organisiert den Rest mit WG-Website. So wisst ihr immer was im Kühlschrank fehlt und wer wieder einmal etwas zahlen sollte.</h6>
                </div>
            </div>
            <div class="col-sm col-xs-12 text-center mt-2">
                <div>
                    <h3><i class="bi bi-people"></i> für Familien</h3>
                    <H6 class="text-align-left">Motiviere deine bessere Hälfte, deine Kinder sowie dich selbst beim Mithelfen im Haushalt. Erstelle einen Putzplan. Teilt die Finanzen auf. So bleibt mehr Zeit für die wichtigen Dinge im Leben!</H6>
                </div>
            </div>
            <div class="col-sm col-xs-12 text-center mt-2">
                <div class="col-sm-12">
                    <h3><i class="bi bi-balloon-heart"></i> für Paare</h3>
                    <h6 class="text-align-left">Keine Diskussionen mehr über den Einkauf, Finanzen oder die Hausarbeit. So bleibt mehr Zeit für die Person, der dir am liebsten ist.</h6>
                </div>
            </div>
        </div>

        <div class="row align-items-start">
            <div class="col-sm col-xs-12 m-2 float-box">
                <div class="m-2">
                    <h2 class="">Finanzen</h2>
                    <div class="row">
                        <div class="col-md-8 col-xs-12 ml-2">
                            <h5 class="">Teilt die Finanzen auf</h5>
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
                            <h5 class="">Erstellt eine Putzplan</h5>
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
                            <h5 class="">Chattet miteinander</h5>
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
                            <h5 class="">Erstellt einen Einkaufsliste</h5>
                        </div>
                    </div>
                </div>
                <img height="100%" width="100%" src="/images/img_shopping.jpg">
            </div>
        </div>
    </section>

@endsection
