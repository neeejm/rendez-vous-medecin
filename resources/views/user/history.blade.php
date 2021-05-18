@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">{{ __('Historique') }}</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($rvs as $rv)
                            <li class="list-group-item">                    
                                {{ $rv }} 
                                {{ $docs[$rv->doc_id] }} 
                            </li><br>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection