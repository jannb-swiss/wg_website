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

                @if ($allUsersCount > $cleaningPlansCount)
                    <strong>Erstelle gleiche viele PutzItems oder mehr wie Users existieren!</strong>
                @endif

                <div class="col-md-8">

                    <div class="card">
                        <div class="card-header">Tasks</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <th scope="col">Tasks</th>
                                <th scope="col">Löschen</th>
                                </thead>
                                @foreach ($cleaningPlansUnsort as $cleaningPlan)

                                    <tbody>
                                    <tr>

                                        <td>
                                            {{ $cleaningPlan->cleaning_task }}
                                        </td>
                                        <td class="text-right mt-2">
                                                <form method="POST"
                                                      action="{{ route('cleaningPlan.destroy', $cleaningPlan->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-primary">Löschen</button>
                                                </form>
                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">Putzplan</div>
                    <div class="card-body">
                        <table class="table" method="POST" action="{{ route('cleaningPlan.update') }}">
                            @csrf
                            @method('PATCH')
                            <thead>
                            <th scope="col">Users</th>
                            <th scope="col">Tasks</th>
                            </thead>
                            {{--@for($i = 0; $i < $maxLength; ++$i)--}}

                            @foreach ($allUsers as $au => $test)
                                <tbody>
                                <tr>
                                    <td>
                                        {{--{{$allUsers->name}}--}}
                                        {{ $test->name }}
                                    </td>
                                    <td>
                                        {{--{{$cleaningPlan->cleaning_task }}--}}
                                        @if(!empty($cleaningPlans[$au]->cleaning_task))
                                            {{ $cleaningPlans[$au]->cleaning_task }}
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                            {{--@endfor--}}
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">Produkt hinzufügen</div>

            <div class="card-body">
                <form method="POST" action="{{ route('cleaningPlan.store') }}">

                    @csrf

                    <div class="form-group">
                        <div class="row">
                            <label for="cleaning_task">Item</label>
                            <input id="cleaning_task" name="cleaning_task" type="text" maxlength="255"
                                   class="form-control{{ $errors->has('cleaning_task') ? ' is-invalid' : '' }}"
                                   autocomplete="off"/>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Hinzufügen</button>
                </form>
            </div>
        </div>
    </div>
</section>
