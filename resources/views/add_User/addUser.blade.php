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
'heroTitle' => 'User hinzufügen',
'heroSubtitle' => 'Registrieren',
'heroImage' => '/images/home_img.jpg',
'heroImageTitle' => 'WG-Website'
])

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="float-box mt-4 mb-3">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @if (session('status-bad'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('status-bad') }}
                    </div>
                @endif

                <div class="card-body">
                    <p>Gib die EMail-Adresse ein um einen User hinzuzufügen. Der User muss jedoch bereits registriert
                        sein.</p>
                    <form method="POST" action="{{ route('addUser') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-end">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Einladen
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

