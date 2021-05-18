@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">{{ __('Ajouter au Tarif') }}</div>

                <div class="card-body">
                    @isset($_GET['status'])
                        <div class="alert alert-success" role="alert">
                            {{ $_GET['status'] }}
                        </div>
                    @endisset

                    <div class="container">
                        <div class="text-center">
                            <form method="POST" action="{{ route('profile.tarif') }}">
                                @csrf
                                    <label for="title">Titre</label>
                                    <input id="title" type="text" name="title" required>

                                    <label for="price">Price</label>
                                    <input id="price" type="number" name="price" min="0" required>

                                    <button type="submit" class="btn btn-primary">
                                        +
                                    </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">{{ __('Tarifs') }}</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($tars as $tar)
                            <li class="list-group-item">                    
                                {{ $tar }} 
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection