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

                    <div class="card-body">
                        <form method="POST" action="{{ route('invite.inviteUser') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-end">Emali</label>

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
