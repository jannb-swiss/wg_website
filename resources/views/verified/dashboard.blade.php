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

    <div class="card-body">
        <form method="POST" action="{{ route('createWG') }}">
            @csrf

            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text"
                           class="form-control @error('wg_name') is-invalid @enderror" name="wg_name"
                           value="{{ old('wg_name') }}" required autocomplete="wg_name" autofocus>

                    @error('wg_name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

<!--            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>-->

        </form>
    </div>
</div>
