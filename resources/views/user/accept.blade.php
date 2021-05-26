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

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-8 col-xl-8">
                    <div class="education-widget">
                        <h3 class="sub-title">Rendez-vous:</h3>
                        <div class="experience-box">
                            <ul class="experience-listy">
                                    @if ($rv->state == config('global.approved'))
                                        <li class="bg-primary text-white list-group-item">                    
                                        @php
                                            $state = "approuvée";
                                        @endphp
                                    @elseif ($rv->state == config('global.done'))
                                        <li class="bg-success text-white list-group-item">                    
                                        @php
                                            $state = "conclu";
                                        @endphp
                                    @elseif ($rv->state == config('global.denied'))
                                        <li class="bg-danger text-white list-group-item">                    
                                        @php
                                            $state = "refusé";
                                        @endphp
                                    @elseif ($rv->state == config('global.passed'))
                                        <li class="bg-warning list-group-item">                    
                                        @php
                                            $state = "passé";
                                        @endphp
                                    @elseif ($rv->state == config('global.canceled'))
                                        <li class="bg-secondary text-white list-group-item">                    
                                        @php
                                            $state = "annulé";
                                        @endphp
                                    @elseif ($rv->state == config('global.on_hold'))
                                        <li class="bg-light text-black list-group-item">                    
                                        @php
                                            $state = "en attente";
                                        @endphp
                                    @endif
                                        <h3>{{ $rv->rv_id }}</h3>
                                        <p>Nom du docteur: {{ $doc->fname . ' ' . $doc->lname }}</p> 
                                        <p>Horaire: {{ $date . '>>>' . $time }}</p> 
                                        <p>Tarif: {{ $price }}</p> 
                                        <p>Raisons: {{ $rv->reasons }}</p> 
                                        <p>Detail de rendez-vous: {{ $rv->doc_detail }}</p> 
                                        <p>Images suppletives: 
                                                {{-- <a href="{{ route('image', ['path' => $imgs->where('rv_id', $rv->rv_id)->first()->img,]) }}" >img</a>             --}}
                                            @php
                                                $n = 0;
                                            @endphp
                                            @foreach ($imgs->where('rv_id', $rv->rv_id) as $img)
                                                @isset($img->img)
                                                    @php
                                                        $n++;
                                                    @endphp
                                                    <a href="{{ route('image', ['path' => $img->img,]) }}" >&nbsp;< {{ $n }} >&nbsp;</a>           
                                                @endisset
                                            @endforeach
                                        </p>
                                        <p>Fichiers suppletives: 
                                                {{-- <a href="{{ route('image', ['path' => $imgs->where('rv_id', $rv->rv_id)->first()->img,]) }}" >img</a>             --}}
                                            @php
                                                $n = 0;
                                            @endphp
                                            @foreach ($files->where('rv_id', $rv->rv_id) as $file)
                                                @isset($file->file)
                                                    @php
                                                        $n++;
                                                    @endphp
                                                    <a download="file.docx" href="{{ asset('storage/' . $file->file)}}">&nbsp;< {{ $n }} >&nbsp;</a>
                                                @endisset
                                            @endforeach
                                        </p>
                                        <p>Etat du rendez-vous: {{ $state }}</p>
                                        @if ($rv->state == config('globals.on_hold'))
                                            <a href="{{ action([App\Http\Controllers\User\AcceptController::class, 'accept'], ['id' => $rv->rv_id,]) }}" class="btn btn-primary active" role="button" aria-pressed="true">
                                                Accept
                                            </a>
                                            <a href="{{ action([App\Http\Controllers\User\AcceptController::class, 'reject'], ['id' => $rv->rv_id,]) }}" class="btn btn-secondary active" role="button" aria-pressed="true">
                                                Reject
                                            </a>
                                        @endif
                                        @if ($rv->state == config('global.approved'))
                                        {{-- @if ($rv->state == config('global.approved') && $date == date('Y-m-d')) --}}
                                            <div>
                                                <a href="{{ route('profile.redirectTo', ['id' => $rv->rv_id,]) }}" class="btn btn-primary active" role="button" aria-pressed="true">
                                                    Conclude
                                                </a>
                                            </div>
                                        @endif
                                    </li><br>
                            </ul>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
@endsection
                                    {{-- @foreach ($rvs as $rv)
                                        @if ($rv->state == config('global.on_hold'))
                                                    {{ $rv->rv_id }}

                                            <div>
                                                <a href="{{ action([App\Http\Controllers\User\AcceptController::class, 'accept'], ['id' => $rv->rv_id,]) }}" class="btn btn-primary active" role="button" aria-pressed="true">
                                                    Accept
                                                </a>
                                                <a href="{{ action([App\Http\Controllers\User\AcceptController::class, 'reject'], ['id' => $rv->rv_id,]) }}" class="btn btn-secondary active" role="button" aria-pressed="true">
                                                    Reject
                                                </a>
                                            </div>
                                            <br>
                                        @endif
                                    @endforeach --}}