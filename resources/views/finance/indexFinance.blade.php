<x-app-layout></x-app-layout>

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
                    <div class="card-header">Users</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <th scope="col">User</th>
                            <th scope="col" class="text-align-right">Preis</th>
                            </thead>
                                <tbody>
                                @foreach ($finances_sums as $finances_sum)
                                <tr>
                                    <td>
                                        {{ $finances_sum->name }}
                                    </td>
                                    <td class="text-align-right">
                                        {{ $finances_sum->sum }}
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                        </table>
                    </div>

                    {{ $finances->links() }}
                </div>

                @if (session('status'))
                    <div class="alert alert-success mt-2" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @if (session('status_delete'))
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ session('status_delete') }}
                    </div>
                @endif

                @error(session('statusError'))
                <div class="alert alert-danger mt-2" role="alert">
                    <p>Bitte trage das Produkt und für den Preis eine Zahl ein!</p>
                </div>
                @enderror

                <div class="card mt-3">
                    <div class="card-header">Produkt hinzufügen</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('finance.store') }}">

                            @csrf

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-9">
                                        <label for="finance_title">Produkt</label>
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
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Hinzufügen</button>
                        </form>

                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <th scope="col">Produkt</th>
                                <th scope="col">Preis</th>
                                <th scope="col" class="text-align-right me-2 pe-4">Löschen</th>
                                </thead>
                                    <tbody>
                                    @foreach ($finances as $finance)
                                    <tr class="">
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
                                        <td class="text-right mt-2 text-align-right">
                                            <form method="POST"
                                                  action="{{ route('finance.destroy', $finance->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-primary">Löschen</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>

                            </table>

                            {{ $finances->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div>
    @include('components.footer')
</div>
