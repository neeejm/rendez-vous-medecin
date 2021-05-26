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
                        <span>Page de Tarifs:</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="text-center">
            <form method="POST" action="{{ route('profile.tarif') }}">
                @csrf
                    <label for="title">Titre</label>
                    <input id="title" type="text" name="title" required>

                    <label for="price">Price</label>
                    <input id="price" type="number" name="price" min="0" max="10000" required>

                    <button type="submit" class="btn btn-sm btn-primary">
                        +
                    </button>
            </form>
        </div>
    </div>
</div>

<div class="main-content account-content">
    <div class="content">
        <div class="container">
            <div class="account-box">
                <div class="appointment">
                    <div class="tab-content">
                        <div class="form-group">
                            <label class="m-b-20">Liste des tarifs:</label>
                            <ul class="appoint-time">
                                @foreach ($tars as $tar)
                                    <li>                    
                                        {{ $tar->title . ': ' . $tar->price }} 
                                        <button type="button" class="btn btn-sm btn-outline-dark">
                                            <a href="{{ action([App\Http\Controllers\User\TarifController::class, 'cancel'], ['id' => $tar->tar_id,]) }}"> - </a>
                                        </button></small>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection