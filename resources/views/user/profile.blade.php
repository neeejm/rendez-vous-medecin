@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    @isset($_GET['status']) 
                        <div class="alert alert-success" role="alert">
                            {{ $_GET['status'] }}
                        </div>
                    @endisset

                    {{-- {{ Auth::user()->user_type }} --}}
                    @if ( Auth::user()->user_type == config('global.admin') ) 
                        @include('user.admin')

                    @elseif ( Auth::user()->user_type == config('global.doctor') ) 
                        @include('user.doctor')

                    @else
                        @include('user.client')

                    @endif
                </div>
                {{-- <img src="{{ asset('images/mdoctor.png') }}" alt=""> --}}
            </div>
        </div>
    </div>
</div>
@endsection