<x-app-layout>
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

<div class="float-box mt-4">
    <a href="/createWG" class="nav-link px-2 footer-font">WG erstellen</a>
    <a href="/modifyUser" class="nav-link px-2 footer-font">User Bearbeiten</a>
</div>
