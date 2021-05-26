@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title">
                        <span>Page d'Horaire</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="text-center">
            <form method="POST" action="{{ route('profile.calendar') }}">
                @csrf
                    <label for="date">Date</label>
                    <input id="date" type="date" name="date" required>

                    <label for="time">Time</label>
                    <input id="time" type="time" name="time" required>

                    <button type="submit" class="btn btn-sm btn-primary">
                        +
                    </button>
            </form>
        </div>
    </div>
</div>

<div class="main-content account-content">
    <div class="content">
        <div class="container">
            <div class="container-fluid">
                <div class="border border-primary border-right-0 border-bottom-0">
                    @foreach ($cals as $date => $time)
                        <div class="p-2 border border-primary border-left-0 border-top-0 text-truncate bg-light text-muted">
                            <h5 class="row align-items-center">
                                <span class="col-3 border-primary border-right">{{ date('D d M Y', strtotime($date)) }}</span>
                                @foreach ($time as $id => $t)
                                    <small class="col text-center text-muted" style="font-size: 1em;">
                                        {{ date('H:i', strtotime($t)) }}
                                        <button type="button" class="btn btn-sm btn-outline-dark">
                                            <a href="{{ action([App\Http\Controllers\User\CalendarController::class, 'cancel'], ['id' => $id,]) }}"> - </a>
                                        </button></small>
                                @endforeach
                            </h5>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<br>


@endsection