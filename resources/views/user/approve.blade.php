@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title">
                        <span>Approbation</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
                                                                <br>
                                                                @foreach ($sps as $sp)
                                                                    @if (explode(',', $sp)[0] == $doc->doc_id)
                                                                        {{ explode(',', $sp)[1] }}  <br> 
                                                                    @endif
                                                                @endforeach
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
                                                        @if (!$doc->is_valid)
                                                            <a href="{{ action([App\Http\Controllers\User\ApproveController::class, 'approve'], ['id' => $doc->doc_id,]) }}" class="btn btn-primary active" role="button" aria-pressed="true">
                                                                Approve
                                                            </a>
                                                            <a href="{{ action([App\Http\Controllers\User\ApproveController::class, 'deny'], ['id' => $doc->doc_id,]) }}" class="btn btn-secondary active" role="button" aria-pressed="true">
                                                                Deny
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                        



                </div>
            </div>
        </div>
    </div>
</div>

@endsection