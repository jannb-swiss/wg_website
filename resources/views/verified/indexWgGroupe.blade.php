<x-app-layout class="mb-0">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
            This is a testt
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome/>
            </div>
        </div>
    </div>
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
{{--@foreach($wgGroups as $wgGroup)
    {{$wgGroup->wg_name}}
    @endforeach--}}

    <div class="row align-items-start">
        <div class="col-sm col-xs-12 m-2 float-box">
            <div class="m-2">
                <h2 class="">Finanzen</h2>
                <div class="row">
                    <div class="col-md-8 col-xs-12 ml-2">
                        <h5 class="">Krieg deine Finanzen in den Griff</h5>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <a href="/finance" class="href-box">Bearbeiten<i class="icon-box bi bi-caret-right"></i></a>
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
                        <a href="/clean" class="href-box">Bearbeiten<i class="icon-box bi bi-caret-right"></i></a>
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
                        <a href="chat" class="href-box">Bearbeiten<i class="icon-box bi bi-caret-right"></i></a>
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
                        <a href="/einkaufsliste" class="href-box">Bearbeiten<i class="icon-box bi bi-caret-right"></i></a>
                    </div>
                </div>
            </div>
            <img height="100%" width="100%" src="/images/img_shopping.jpg">
        </div>
    </div>
    </section>
