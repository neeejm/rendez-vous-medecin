@extends('layouts.app')

@section('content')
<div class="main-content">
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title"> 
                        <span>Page de recherche:</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-4 mt-4">
        <form  method="POST" action="{{ route('home_search') }}"> 
            @csrf
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">{{ __('Spécilatés') }}</label>
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
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

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

@isset($docs)
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-header text-center">
                            <h3 class="header-title">Liste de professionels de santé</h3>
                            <div class="line"></div>
                        </div>
                    </div>
                </div>
                <div class="row doctors-list">
                    @foreach ($docs as $doc)
                        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="doctor-list">
                                <div class="doctor-inner">
                                    <div class="row container mt-4">
                                        <div class="col-4 col-md-4 col-lg-4 col-xl-4">
                                            <img class="img-fluid" alt="" src="{{ ($doc->gender == 0) ? asset('storage/images/fdoctor.png') : asset('storage/images/mdoctor.png') }}" height="250" width="220">
                                        </div>
                                        <div class="col-8 col-md-8 col-lg-8 col-xl-8">
                                                <h6 style="display: inline">Numero de téléphone:</h6> <p style="display: inline">{{ $doc->phone_num }}</p> <br>
                                                <h6 style="display: inline">Numero de fax:</h6> <p style="display: inline">{{ $doc->fax_num }}</p> <br>
                                                <h6 style="display: inline">Sexe:</h6> <p style="display: inline">{{ ($doc->gender == 0) ? 'femme' : 'homme' }}</p> <br>
                                                <h6 style="display: inline">Specialités:</h6> <p style="display: inline">
                                                    {{-- @foreach ($collection as $item)
                                                        
                                                    @endforeach --}}
                                                    {{-- {{ $doc->sp_id }} --}}
                                                </p> <br>
                                        </div>
                                    </div>
                                    <div class="doctor-details">
                                        <div class="doctor-info">
                                            <h4 class="doctor-name"><a href="doctor-details.html">{{ ucwords($doc->fname . " " . $doc->lname) }}</a></h4>
                                            <p>
                                                <span class="depart">{{ $cs->where('ci_id', $adr->where('doc_id', $doc->doc_id)->first()->ci_id)->first()->city }}</span>
                                            </p>
                                        </div>
                                        <div class="view-profie"> 
                                            <a href="{{ action([App\Http\Controllers\User\RendezVousController::class, 'index'], ['id' => $doc->doc_id,]) }}">
                                                Prendre rendez-vous
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endisset
@endsection