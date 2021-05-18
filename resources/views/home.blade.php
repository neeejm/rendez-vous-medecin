@extends('layouts.app')

@section('head_content')
    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap-select.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap-select.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">{{ __('Rechercher') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}

                    <form  method="POST" action="{{ route('home_search') }}"> 
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Spécilaté') }}</label>
                            <div class="col-md-6">
                                <select class="selectpicker form-control" name="sps[]" multiple data-live-search="true" >
                                    @foreach ($sps as $item)
                                        <option value="{{ $item->sp_id }}">{{ $item->sp_id }} + {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Ville') }}</label>
                            <div class="col-md-6">
                                <select class="selectpicker form-control" name="city">
                                    <option></option>
                                    @foreach ($cs as $item)
                                        <option value="{{ $item->ci_id }}">{{ $item->ci_id }} + {{ $item->city }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> 

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                Rechercher
                            </button>
                            <a href="{{ action([App\Http\Controllers\HomeController::class, 'findAll']) }}" class="btn btn-primary active" role="button" aria-pressed="true">
                                Tout
                            </a>
                        </div>
                    </form>

                    <br>

                    <form  method="POST" action="{{ route('home_name') }}"> 
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" >
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                Rechercher nom
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @isset($docs)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header">{{ __('List') }}</div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($docs as $doc)
                                <li class="list-group-item">
                                    {{ $doc }} 
                                    <br>
                                    <a href="{{ action([App\Http\Controllers\User\RendezVousController::class, 'index'], ['id' => $doc->doc_id,]) }}" class="btn btn-primary active" role="button" aria-pressed="true">
                                        prendre rendez-vous
                                    </a>
                                </li><br>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endisset
</div>
@endsection