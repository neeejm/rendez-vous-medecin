@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">{{ __('Approve page') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="list-group">
                        @foreach ($docs as $doc)
                            @if (!$doc->is_valid)
                                <li class="list-group-item">
                                        {{ $doc->doc_id }}

                                <div>
                                    <a href="{{ action([App\Http\Controllers\User\ApproveController::class, 'approve'], ['id' => $doc->doc_id,]) }}" class="btn btn-primary active" role="button" aria-pressed="true">
                                        Approve
                                    </a>
                                    <a href="{{ action([App\Http\Controllers\User\ApproveController::class, 'deny'], ['id' => $doc->doc_id,]) }}" class="btn btn-secondary active" role="button" aria-pressed="true">
                                        Deny
                                    </a>
                                </div>
                                </li> <br>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection