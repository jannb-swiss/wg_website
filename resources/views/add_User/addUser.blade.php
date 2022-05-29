@extends('layouts.master')

@section('content')

    @include('layouts.hero', [
    'heroTitle' => 'Happy Living',
    'heroSubtitle' => 'Registrieren',
    'heroImage' => '/images/home_img.jpg',
    'heroImageTitle' => 'Happy Lifing'
])
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="float-box mt-4">

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
                        <p>Gib die EMail-Adresse ein um einen User hinzuzufügen. Der User muss jedoch bereits registriert sein.</p>
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
@endsection
