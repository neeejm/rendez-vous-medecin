@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">{{ __('Conclude page') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('profile.conclude', ['id' => $id,]) }}" enctype="multipart/form-data">
                        @csrf
                        {{ $id }}
                        <br>
                        <h3>Nom docteur</h3>
                        {{ $doc_name }}
                        <br>
                        <h3>Nom client</h3>
                        {{ $client_name }}
                        <br>
                        <h3>Calendar</h3>
                        {{ $cal }}
                        <br>
                        <h3>Tarif</h3>
                        {{ $tar }}
                        <br>
                        <h3>Raison</h3>
                        {{ $reason }}
                        <br>
                        <h3>Detail du rendez-vous</h3>
                        <textarea id="detail" type="text" class="form-control" name="detail" rows="10" value="{{ old('detail') }}" required autocomplete="detail" autofocus></textarea>
                        <br>
                        <h3>Image supplumentaire</h3>
                        <label for="img">Ajouter image:</label>
                        <input type="file" id="img" name="img" class="form-control"accept="image/*" >
                        <br>
                        <h3>Fichier supplumentaire</h3>
                        <label for="file">Ajouter fichier:</label>
                        <input type="file" id="file" name="file" class="form-control" accept=".doc, .docx, .txt, .pdf">
                        <br>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Conclude') }}
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection