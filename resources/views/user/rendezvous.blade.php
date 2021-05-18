@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">{{ __('Rendez-vous') }}</div>

                <form method="POST" action="{{ route('rv', ['id' => $id,]) }}">
                    @csrf
                    <div class="card-body">
                        <h3>Nom docteur</h3>
                        {{ $doc_name }}
                        <br>
                        <h3>Nom client</h3>
                        {{ $client_name }}
                        <br>
                        <h3>Calendar</h3>
                        <div class="form-check">
                            @foreach ($cals as $cal)
                                <input class="form-check-input" type="radio" name="cal" value="{{ $cal->dt_id }}" id="cal" required>
                                <label class="form-check-label" for="cal">
                                    {{ $cal }}
                                </label>
                            @endforeach
                        </div>
                        <br>
                        <h3>Tarif</h3>
                        <div class="form-check">
                            @foreach ($tars as $tar)
                                <input class="form-check-input" type="radio" name="tar" value="{{ $tar->tar_id }}" id="tar" required>
                                <label class="form-check-label" for="tar">
                                    {{ $tar }}
                                </label>
                            @endforeach
                        </div>
                        <br>
                        <h3>Raison</h3>
                        <textarea id="reason" type="text" class="form-control" name="reason" value="{{ old('reason') }}" required autocomplete="reason" autofocus></textarea>
                        <br>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Prendre') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection