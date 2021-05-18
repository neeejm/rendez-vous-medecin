@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">{{ __('Ajouter au Calendrier') }}</div>

                <div class="card-body">
                    @isset($_GET['status'])
                        <div class="alert alert-success" role="alert">
                            {{ $_GET['status'] }}
                        </div>
                    @endisset

                    <div class="container">
                        <div class="text-center">
                            <form method="POST" action="{{ route('profile.calendar') }}">
                                @csrf
                                    <label for="date">Date</label>
                                    <input id="date" type="date" name="date" required>

                                    <label for="time">Time</label>
                                    <input id="time" type="time" name="time" required>

                                    <label for="state">Statue</label>
                                    <input id="state" type="text" name="state" value="free" disabled>

                                    <button type="submit" class="btn btn-primary">
                                        +
                                    </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">{{ __('Calendrier') }}</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($cals as $cal)
                            <li class="list-group-item">                    
                                {{ $cal }} 

                                {{-- <br>
                                    <a href="{{ action([App\Http\Controllers\User\CalendarController::class, 'edit'], [
                                        'id' => $cal->doc_id,
                                        'date' => $cal->date,
                                        'time' => $cal->time,
                                        'status' => $cal->status,
                                        ]) }}" class="btn btn-primary active" role="button" aria-pressed="true">
                                        e
                                    </a> --}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection