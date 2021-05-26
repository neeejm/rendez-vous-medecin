@extends('layouts.app')

@section('content')

        @isset($_GET['msg']) 
            <div class="alert alert-success" role="alert">
                {{ $_GET['msg'] }}
            </div>
        @endisset
    <div class="main-content">
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title">
                            <span>Mon Profile</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- {{ Auth::user()->user_type }} --}}
        @if ( Auth::user()->user_type == config('global.admin') ) 
            @include('user.admin')

        @elseif ( Auth::user()->user_type == config('global.doctor') ) 
            @include('user.doctor')

        @else
            @include('user.client')

        @endif
    </div>

@endsection