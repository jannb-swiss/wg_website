@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">Chats</div>
            <div class="card-body">
                <chat-messages :messages="messages"></chat-messages>
            </div>
            <div class="card-footer">
                <chat-form v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></chat-form>
            </div>
        </div>
    </div>

    <div>
        @include('components.footer')
    </div>

@endsection

