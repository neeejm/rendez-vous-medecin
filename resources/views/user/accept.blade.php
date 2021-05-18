@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">{{ __('Accept page') }}</div>

                <div class="card-body">

                    <ul class="list-group">
                        @foreach ($rvs as $rv)
                            {{ $rv->state . ' == ' . config('global.approved')}}
                            @if ($rv->state == config('global.on_hold'))
                                <li class="list-group-item">
                                        {{ $rv->rv_id }}

                                <div>
                                    <a href="{{ action([App\Http\Controllers\User\AcceptController::class, 'accept'], ['id' => $rv->rv_id,]) }}" class="btn btn-primary active" role="button" aria-pressed="true">
                                        Accept
                                    </a>
                                    <a href="{{ action([App\Http\Controllers\User\AcceptController::class, 'reject'], ['id' => $rv->rv_id,]) }}" class="btn btn-secondary active" role="button" aria-pressed="true">
                                        Reject
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