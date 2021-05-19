@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">{{ __('Conclude page') }}</div>

                <div class="card-body">

                    @isset($_GET['status'])
                        <div class="alert alert-success" role="alert">
                            {{ $_GET['status'] }}
                        </div>
                    @endisset

                    <ul class="list-group">
                        @foreach ($rvs as $rv)
                            {{-- {{ $rv->state . ' == ' . config('global.approved')}} --}}
                            @if ($rv->state == config('global.approved'))
                                <li class="list-group-item">
                                        {{ $rv->rv_id }}

                                <div>
                                    <a href="{{ route('profile.redirectTo', ['id' => $rv->rv_id,]) }}" class="btn btn-primary active" role="button" aria-pressed="true">
                                        Conclude
                                    </a>
                                </div>
                                </li><br>
                            @endif
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection