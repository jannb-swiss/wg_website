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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Benutzers</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <th scope="col">User</th>
                            <th scope="col">Preis</th>
                            </thead>
                            @foreach ($finances_sums as $finances_sum)
                                <tbody>
                                <tr>
                                    <td>
                                        {{ $finances_sum->name }}
                                    </td>
                                    <td>
                                        {{ $finances_sum->sum }}
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>

                    {{ $finances->links() }}
                </div>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card mt-3">
                <div class="card-header">Produkt hinzufügen</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('finance.store') }}">

                        @csrf

                        <div class="form-group">
                            <div class="row">
                                <div class="col-9">
                                    <label for="finance_title">Item</label>
                                    <input id="finance_title" name="finance_title" type="text" maxlength="255"
                                           class="form-control{{ $errors->has('finance_title') ? ' is-invalid' : '' }}"
                                           autocomplete="off"/>
                                </div>
                                <div class="col-3">
                                    <label for="finance_title">Preis</label>
                                    <input id="item_price" name="item_price" type="text" maxlength="255"
                                           class="form-control{{ $errors->has('item_price') ? ' is-invalid' : '' }}"
                                           autocomplete="off"/>
                                </div>
                            </div>
                            @if ($errors->has('finance_title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('finance_title') }}</strong>
                                </span>
                            @endif

                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Hinzufügen</button>
                    </form>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <th scope="col">Item</th>
                            <th scope="col">Preis</th>
                            <th scope="col">Löschen</th>
                            </thead>
                            @foreach ($finances as $finance)
                                <tbody>
                                <tr>
                                    <td>
                                        @if (! $finance->is_complete)
                                            {{ $finance->finance_title }}
                                        @endif
                                    </td>
                                    <td>
                                        @if (! $finance->is_complete)
                                            {{ $finance->item_price }}
                                        @endif
                                    </td>
                                    <td class="text-right mt-2">
                                        {{--@if (! $finance->is_complete)--}}
                                            <form method="POST"
                                                  action="{{ route('finance.destroy', $finance->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-primary">Löschen</button>
                                            </form>
                                        {{--@endif--}}
                                    </td>
                                </tr>
                                </tbody>

                            @endforeach
                        </table>

                        {{ $finances->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
