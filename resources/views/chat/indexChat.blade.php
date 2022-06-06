@extends('layouts.app')

@section('content')

    @include('layouts.hero', [
'heroTitle' => 'Happy Living',
'heroSubtitle' => 'Make living great again',
    'heroImage' => '/images/img_phone_2.jpg',
    'heroImageTitle' => 'WG-Website'
])
    <section class="container-lg mt-3">
        <div class="">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Nachrichten</div>
                        <div class="card-body">
                            <chat-messages :messages="messages"></chat-messages>
                        </div>
                        <div class="card-footer">
                            <chat-form v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></chat-form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <div>
            @include('components.footer')
        </div>

@endsection

