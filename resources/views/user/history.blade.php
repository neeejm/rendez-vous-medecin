@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title">
                            <span>Historique:</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-4 col-xl-4 doctor-sidebar">
                        <div class="doctor-list doctor-view">
                            <div class="doctor-inner">
                                <div class="container m-4">
                                    <div class="doctor-info">
                                        <h4 class="doctor-name">useername</h4>
                                    </div>
                                    <div class="book-appointment"> 
                                        <ul>
                                            <li>
                                                <a href="{{ route('profile.history') }}">Historique</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('profile.crv') }}">liste des rendez-vous</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-8 col-lg-8 col-xl-8">
                        <div class="education-widget">
                            <h3 class="sub-title">Liste des rendez-vous:</h3>
                            <div class="experience-box">
                                <ul class="experience-list">
                                    @foreach ($rvs as $rv)
                                        <li class="list-group-item">                    
                                            <h3>{{ $rv->rv_id }}</h3>
                                            <p>Nom du docteur: {{ $docs[$rv->doc_id]->fname . ' ' . $docs[$rv->doc_id]->lname }}</p> 
                                            <p>Horaire: {{ str_replace(' ', ' >>> ', $dts->where('dt_id', $rv->dt_id)->first()->date_time) }}</p> 
                                            <p>Tarif: {{ $tars->where('tar_id', $rv->tar_id)->first()->price }}</p> 
                                            <p>Raisons: {{ $rv->reasons }}</p> 
                                            <p>Detail de rendez-vous: {{ $rv->doc_detail }}</p> 
                                            <p>Images de rendez-vous: 
                                                @isset($imgs->where('rv_id', $rv->rv_id)->first()->img)
                                                    {{-- <a href="{{ route('image', ['path' => $imgs->where('rv_id', $rv->rv_id)->first()->img,]) }}" >img</a>             --}}
                                                    <a href="{{ route('image') }}" >img</a>            
                                                @endisset
                                        </li><br>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
