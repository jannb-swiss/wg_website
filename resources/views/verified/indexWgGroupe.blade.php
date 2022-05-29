<x-app-layout>

</x-app-layout>

@include('layouts.hero', [
'heroTitle' => 'Happy Living',
'heroSubtitle' => 'Make living great again',
'heroImage' => '/images/home_img.jpg',
'heroImageTitle' => 'Happy Lifing'
])

<section class="container-lg mt-5">

    @isset($wgName)
        <h1>{{$wgName}}</h1>
    @endisset

    <div class="row">
        <div class="col-md-3 col-xs-12 mb-1">

            @isset($User)
                <form method="POST" action="{{ route('wgGroup.update') }}">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-light">Gruppe Verlassen</button>
                </form>
            @endisset

        </div>
        <div class="col-md-3 col-xs-12 mb-1">
            <a href="/mitglied" class="btn btn-light href-box">Bewohner hinzufügen</a>
        </div>
    </div>

    <div class="row align-items-start">
        <div class="col-sm col-xs-12 m-2 float-box">
            <div class="m-2">
                <div class="row">
                    <div class="col-md-7 col-xs-12 ml-2">
                        <h2 class="">Finanzen</h2>
                    </div>
                    <div class="col-md-5 col-xs-12 mt-2 text-align-right-wg">
                        <a href="/finanzen" class="href-box">zum Finanzplan<i class="icon-box bi bi-caret-right"></i></a>
                    </div>
                </div>
            </div>
            <img height="100%" width="100%" src="/images/img_finance.jpg">
        </div>

        <div class="col-sm col-xs-12 m-2 float-box">
            <div class="m-2">
                <div class="row">
                    <div class="col-md-7 col-xs-12 ml-2">
                        <h2 class="">Putzplan</h2>
                    </div>
                    <div class="col-md-5 col-xs-12 mt-2 text-align-right-wg">
                        <a href="/putzplan" class="href-box">zum Putzplan<i class="icon-box bi bi-caret-right"></i></a>
                    </div>
                </div>
            </div>
            <img height="100%" width="100%" src="/images/img_clean.jpg">
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col-sm col-xs-12 m-2 float-box">
            <div class="m-2">
                <div class="row">
                    <div class="col-md-7 col-xs-12 ml-2">
                        <h2 class="">Chat</h2>
                    </div>
                    <div class="col-md-5 col-xs-12 mt-2 text-align-right-wg">
                        <a href="chat" class="href-box text-align-right">zum Chat<i class="icon-box bi bi-caret-right"></i></a>
                    </div>
                </div>
            </div>
            <img height="100%" width="100%" src="/images/img_phone.jpg">
        </div>

        <div class="col-sm col-xs-12 m-2 float-box">
            <div class="m-2">
                <div class="row">
                    <div class="col-md-7 col-xs-12 ml-2">
                        <h2 class="">Einkaufsliste</h2>
                    </div>
                    <div class="col-md-5 col-xs-12 mt-2 text-align-right-wg">
                        <a href="/einkaufsliste" class="href-box">zur Einkaufsliste<i
                                class="icon-box bi bi-caret-right"></i></a>
                    </div>
                </div>
            </div>
            <img height="100%" width="100%" src="/images/img_shopping.jpg">
        </div>
    </div>

</section>

<div>
    @include('components.footer')
</div>
