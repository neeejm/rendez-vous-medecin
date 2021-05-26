@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">{{ __('Liste des rendez-vous') }}</div>

                <div class="card-body">

                    @isset($_GET['status'])
                        <div class="alert alert-success" role="alert">
                            {{ $_GET['status'] }}
                        </div>
                    @endisset

                    <ul class="list-group">
                        @php
                            $ut = Auth::user()->user_type 
                        @endphp

                        @if ($ut == config('global.doctor'))
                            @foreach ($rvs as $rv)
                                {{ $rv->state . ' == ' . config('global.approved')}}
                                <li class="list-group-item">
                                        {{ $rv->rv_id }}
                                        {{ $rv->doc_id }}

                                    @if ($rv->state != config('global.approved') && $rv->state != config('global.done'))
                                        <div>
                                            <a href="{{ route('profile.redirectTo', ['id' => $rv->rv_id,]) }}" class="btn btn-primary active" role="button" aria-pressed="true">
                                                Conclude
                                            </a>
                                        </div>
                                    @endif
                                </li><br>
                            @endforeach
                        @elseif ($ut == config('global.client'))
                            @foreach ($rvs as $rv)
                                <li class="list-group-item">
                                        {{ $rv->rv_id }}
                                        {{ $rv->doc_id }}

                                        @if ($rv->state != config('global.canceled') && $rv->state != config('global.done') && $rv->state != config('global.denied'))
                                            <div>
                                                <a href="{{ route('profile.cancel', ['id' => $rv->rv_id,]) }}" class="btn btn-primary active" role="button" aria-pressed="true">
                                                    Annuler
                                                </a>
                                            </div>
                                        @endif
                                </li><br>
                            @endforeach
                        @endif
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div> --}}


            {{-- @for ($j = 0; $j < 4; $j++)
                @for ($i = 0; $i < 7; $i++)
                        @foreach ($rvs as $rv)
                            @if ($dt->setISODate(date('Y'), $week + $j, $i)->format('Y-m-d') == explode(' ', $rv->date_time)[0])
                                <h5 class="row align-items-center">
                                    <span class="date col-1">{{ $dt->setISODate(date('Y'), $week + $j, $i)->format('d') }}</span>
                                    <small class="col text-center text-muted"></small>
                                    <span class="col-1">{{ $dt->setISODate(date('Y'), $week + $j, $i)->format('D') }}</span>
                                </h5>
                                <p class="d-sm-none">test</p>
                            @endif
                        @endforeach
                @endfor

                <div class="w-100"></div>
            @endfor --}}



    <div class="main-content">
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title">
                            <span>Historique:</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container">

                @php
                    $dt = new DateTime();
                    $w = $week;
                    // echo $w;
                @endphp

                <div class="container-fluid">
                    <header>
                        <h4 class="display-4 mb-4 text-center">{{ $dt->setISODate(date('Y'), $w)->format('M Y') }}</h4>
                        <button type="button" class="m-1 btn btn-circle" style="background-color: #E2E6EA;" onmouseover="this.style.background='#D3D7DB'" onmouseout="this.style.background='#E2E6EA'"></button><span>en attente</span>
                        <button type="button" class="m-1 btn btn-secondary btn-circle"></button><span>annulé</span>
                        <button type="button" class="m-1 btn btn-warning btn-circle"></button><span>passé</span>
                        <button type="button" class="m-1 btn btn-danger btn-circle"></button><span>refusé</span>
                        <button type="button" class="m-1 btn btn-success btn-circle"></button><span>conclu</span>
                        <button type="button" class="m-1 btn btn-primary btn-circle"></button><span>approuvée</span>
                        <br>
                        <div class="btn-group btn-group-toggle mt-4 " data-toggle="buttons">
                            <label class="btn btn-info previous-w">
                                <a href="{{ action([App\Http\Controllers\User\ConcludeController::class, 'previous'], ['week' => $w,]) }}"> <<< </a>
                            </label>
                            <label class="btn btn-info next-w">
                                <a href="{{ action([App\Http\Controllers\User\ConcludeController::class, 'next'], ['week' => $w,]) }}"> >>> </a>
                            </label>
                        </div>
                        <div class="mt-2 row d-none d-sm-flex p-1 bg-info text-white">
                        <h5 class="col-sm p-1 text-center">Dimache</h5>
                        <h5 class="col-sm p-1 text-center">Lundi</h5>
                        <h5 class="col-sm p-1 text-center">Mardi</h5>
                        <h5 class="col-sm p-1 text-center">Mercredi</h5>
                        <h5 class="col-sm p-1 text-center">Jeudi</h5>
                        <h5 class="col-sm p-1 text-center">Vendredi</h5>
                        <h5 class="col-sm p-1 text-center">Samedi</h5>
                        </div>
                    </header>
                    <div class="row border border-right-0 border-bottom-0">
                        @for ($j = 0; $j < 4; $j++)
                            @for ($i = 0; $i < 7; $i++)
                                    <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-lg-inline-block bg-light text-muted">
                                        <div class="container">
                                            <h5 class="row align-items-center">
                                                <span class="date col-1">{{ $dt->setISODate(date('Y'), $w + $j, $i)->format('d') }}</span>
                                                <small class="d-sm-none text-center text-muted">{{ $dt->setISODate(date('Y'), $w + $j, $i)->format('D') }}</small>
                                                <span class="col-1"></span>
                                                @foreach ($rvs as $date => $info)
                                                    @if ($dt->setISODate(date('Y'), $w + $j, $i)->format('Y-m-d') == $date)
                                                        @foreach ($info as $id => $time)
                                                            @if (explode(',', $time)[1] == config('global.approved'))
                                                                {{-- <li class="bg-primary text-white list-group-item">                     --}}
                                                                @php
                                                                    $state = "approuvée";
                                                                @endphp
                                                                <button type="button" class="m-1 btn btn-primary btn-circle">
                                                                    <a href="{{ action([App\Http\Controllers\User\AcceptController::class, 'index'], ['id' => $id,]) }}"> {{ explode(',', $time)[0] }} </a>
                                                                </button>
                                                            @elseif (explode(',', $time)[1] == config('global.done'))
                                                                {{-- <li class="bg-success text-white list-group-item">                     --}}
                                                                @php
                                                                    $state = "conclu";
                                                                @endphp
                                                                <button type="button" class="m-1 btn btn-success btn-circle">
                                                                    <a href="{{ action([App\Http\Controllers\User\AcceptController::class, 'index'], ['id' => $id,]) }}">  {{ explode(',', $time)[0] }}  </a>
                                                                </button>
                                                            @elseif (explode(',', $time)[1] == config('global.denied'))
                                                                {{-- <li class="bg-danger text-white list-group-item">                     --}}
                                                                @php
                                                                    $state = "refusé";
                                                                @endphp
                                                                <button type="button" class="m-1 btn btn-danger btn-circle">
                                                                    <a href="{{ action([App\Http\Controllers\User\AcceptController::class, 'index'], ['id' => $id,]) }}">  {{ explode(',', $time)[0] }} </a>
                                                                </button>
                                                            @elseif (explode(',', $time)[1] == config('global.passed'))
                                                                {{-- <li class="bg-warning list-group-item">                     --}}
                                                                @php
                                                                    $state = "passé";
                                                                @endphp
                                                                <button type="button" class="m-1 btn btn-warning btn-circle">
                                                                    <a href="{{ action([App\Http\Controllers\User\AcceptController::class, 'index'], ['id' => $id,]) }}">  {{ explode(',', $time)[0] }} </a>
                                                                </button>
                                                            @elseif (explode(',', $time)[1] == config('global.canceled'))
                                                                {{-- <li class="bg-secondary text-white list-group-item">                     --}}
                                                                @php
                                                                    $state = "annulé";
                                                                @endphp
                                                                <button type="button" class="m-1 btn btn-secondary btn-circle">
                                                                    <a href="{{ action([App\Http\Controllers\User\AcceptController::class, 'index'], ['id' => $id,]) }}">  {{ explode(',', $time)[0] }}</a>
                                                                </button>
                                                            @elseif (explode(',', $time)[1] == config('global.on_hold'))
                                                                {{-- <li class="bg-light text-black list-group-item">                     --}}
                                                                @php
                                                                    $state = "en attente";
                                                                @endphp
                                                                <button type="button" class="m-1 btn btn-circle" style="background-color: #E2E6EA;" onmouseover="this.style.background='#D3D7DB'" onmouseout="this.style.background='#E2E6EA'">
                                                                    <a href="{{ action([App\Http\Controllers\User\AcceptController::class, 'index'], ['id' => $id,]) }}">  {{ explode(',', $time)[0] }}</a>
                                                                </button>
                                                            @endif
                                                            {{-- <p>{{ $state }}</p> --}}
                                                            {{-- <button type="button" class="m-1 btn btn-primary btn-circle">
                                                                {{ $time }}
                                                            </button> --}}
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </h5>
                                        </div>
                                    </div>
                            @endfor
                            <div class="w-100"></div>
                        @endfor
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection