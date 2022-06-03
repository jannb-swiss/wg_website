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
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">

                @if ($allUsersCount > $cleaningPlansCount)
                    <strong>Erstelle gleiche viele PutzItems oder mehr wie Users existieren!</strong>
                @endif

                <div class="card">
                    <div class="card-header">Putzplan</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <th scope="col">Users</th>
                            <th scope="col">Tasks</th>
                            </thead>
                                <tbody>
                                @foreach ($allUsers as $au => $test)
                                <tr>
                                    <td>
                                        {{ $test->name }}
                                    </td>
                                    <td>
                                        @if(!empty($cleaningPlans[$au]->cleaning_task))
                                            {{ $cleaningPlans[$au]->cleaning_task }}
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                        </table>
                    </div>
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

                <div class="card mt-3">
                    <div class="card-header">Tasks</div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('cleaningPlan.store') }}">
                            @csrf
                            <div class="form-group">
                                <div class="col-12">
                                    <label for="cleaning_task">Task hinzufügen</label>
                                    <input id="cleaning_task" name="cleaning_task" type="text" maxlength="255"
                                           class="form-control{{ $errors->has('cleaning_task') ? ' is-invalid' : '' }}"
                                           autocomplete="off"/>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Hinzufügen</button>
                        </form>

                        <table class="table mt-3">
                            <thead>
                            <th scope="col">Tasks</th>
                            <th scope="col" class="text-align-right pe-4">Löschen</th>
                            </thead>
                                <tbody>
                                @foreach ($cleaningPlansUnsort as $cleaningPlan)
                                <tr>
                                    <td>
                                        {{ $cleaningPlan->cleaning_task }}
                                    </td>
                                    <td class="text-align-right mt-2">
                                        <form method="POST"
                                              action="{{ route('cleaningPlan.destroy', $cleaningPlan->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary">Löschen</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
