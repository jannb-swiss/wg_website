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
'heroImageTitle' => 'Happy Lifing'
])

<section class="container-lg mt-5">

<!--    <script type="text/javascript">

        setInterval(function(){

            $.ajax({
                type: 'GET',
                url: "{{ route('chat.index') }}",
                cache: false,
                success:function(data){
                    $('#my_div').html(data);
                }

            });
        }, 1000);

    </script>-->

    <form method="POST" action="{{ route('chat.store') }}">

        @csrf

        <footer class="form-group component ">
            <div class="row component">
                <label for="message">Nachricht</label>
                <div class="col-md-10">
                    <input id="message" name="message" type="text" maxlength="255"
                           class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}"
                           autocomplete="off"/>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary mt-2">Senden</button>
                </div>
            </div>
        </footer>
    </form>
    <div class="parent" id="my_div">
        <div class="container">
            <div class="row justify-content-center">

                <div class="card-body" id="my_div">
                    <div class="card-body" id="my_div">
                        @foreach ($userMessages as $userMessage)

                            <p class="mb-0">{{ $userMessage->message }}</p>
                            <div class="p-small row">
                                <div class="col-md-2">
                                    <p>{{ $userMessage->name }}</p>
                                </div>
                                <div class="col-md-2">
                                    <p>{{ $userMessage->created_at }}</p>
                                </div>
                            </div>
                            <th></th>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
