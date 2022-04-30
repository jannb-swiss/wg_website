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
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">New shoppingList</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('shoppingList.store') }}">

                            @csrf

                            <div class="form-group">
                                <label for="shopping_list_title">Title</label>
                                <input id="shopping_list_title" name="shopping_list_title" type="text" maxlength="255" class="form-control{{ $errors->has('shopping_list_title') ? ' is-invalid' : '' }}" autocomplete="off" />

                                @if ($errors->has('shopping_list_title'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('shopping_list_title') }}</strong>
                                </span>
                                @endif

                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">shoppingLists</div>

                    <div class="card-body">
                        <table class="table table-striped">
                            @foreach ($shoppingLists as $shoppingList)
                                <tr>
                                    <td>

                                        @if ($shoppingList->is_complete)
                                            <s>{{ $shoppingList->shopping_list_title }}</s>
                                        @else
                                            {{ $shoppingList->shopping_list_title }}
                                        @endif

                                    </td>
                                    <td class="text-right">
                                        @if (! $shoppingList->is_complete)
                                            <form method="POST" action="{{ route('shoppingList.update', $shoppingList->id) }}">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-primary">Complete</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                        {{ $shoppingLists->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>