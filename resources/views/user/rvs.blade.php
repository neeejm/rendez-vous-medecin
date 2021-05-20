@extends('layouts.app')

@section('content')
<div class="container">
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
                                {{-- {{ $rv->state . ' == ' . config('global.approved')}} --}}
                                <li class="list-group-item">
                                        {{ $rv->rv_id }}
                                        {{ $rv->doc_id }}

                                    @if ($rv->state != config('global.approved'))
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
</div>
@endsection