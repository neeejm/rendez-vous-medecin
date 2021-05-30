{{-- gooooooooooooooooooooooooooooooone --}}


@extends('layouts.app')

@section('content')
    
<div class="main-content">
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title">
                        <span>Page d'Horaire</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-8 col-xl-8">
                    <div class="education-widget">
                        <h3 class="sub-title">Rendez-vous:</h3>
                        <div class="experience-box">
                            <div class="container">
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
                                    {{ $cal->date_time }}
                                    <br>
                                    <h3>Tarif</h3>
                                    {{ $tar->title . ' >>> ' . $tar->price }}
                                    <br>
                                    <h3>Raison</h3>
                                    {{ $reason }}
                                    <br>
                                    <h3>Detail du rendez-vous</h3>
                                    <textarea id="detail" type="text" class="form-control" name="detail" rows="10" value="{{ old('detail') }}" required autocomplete="detail" autofocus></textarea>
                                    <br>
                                    <h3>Image supplumentaire</h3>
                                    <label for="img">Ajouter image:</label>
                                    <input type="file" id="img" name="img[]" class="form-control"accept="image/*" multiple>
                                    <br>
                                    <h3>Fichier supplumentaire</h3>
                                    <label for="file">Ajouter fichier:</label>
                                    <input type="file" id="file" name="file[]" class="form-control" accept=".doc, .docx, .txt, .pdf" multiple>
                                    <br>
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Conclude') }}
                                        </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
@endsection