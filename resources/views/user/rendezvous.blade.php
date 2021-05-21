@extends('layouts.app')

@section('content')
<div class="main-content">
    <form method="POST" action="{{ route('rv', ['id' => $id,]) }}">
        @csrf
        {{-- {{ Form::token() }} --}}
        <!-- Page Header -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title">
                            <span>Rendez-vous chez {{ ucwords($doc->fname . ' ' . $doc->lname) }}</span>
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
                                <img class="img-fluid" alt="" src="{{ ($doc->gender == 0) ? asset('storage/images/fdoctor.png') :  asset('storage/images/mdoctor.png')}}" height="400" width="480">
                                <div class="doctor-details">
                                    <div class="doctor-info">
                                        <h4 class="doctor-name">{{ ucwords($doc->fname . ' ' . $doc->lname) }}</h4>
                                        <p>
                                            <span class="depart">{{ $city }}</span>
                                        </p>
                                    </div>
                                    <div class="book-appointment"> 
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Prendre rendez-vous') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-8 col-lg-8 col-xl-8">
                        <div class="about-doctor">
                            <h3 class="sub-title">Info:</h3>
                            <p>{{ $doc->comment }}</p>
                        </div>
                        <div class="experience-widget">
                            <h3 class="sub-title">Specialités:</h3>
                            @foreach ($sps as $sp)
                                <p>{{ $sp->name }} </p> 
                            @endforeach
                        </div>
                        <div class="education-widget">
                            <h3 class="sub-title">Pour contacter:</h3>
                            <div class="experience-box">
                                <ul class="experience-list">
                                    <li>
                                        <div class="timeline-content">
                                            <h4>Numero de téléphone:</h4>
                                            <div>{{ $doc->phone_num }}</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline-content">
                                            <h4>Numero de fax:</h4>
                                            <div>{{ $doc->fax_num }}</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <br>
                        <div class="education-widget">
                            <h3 class="sub-title">Location:</h3>
                            <div class="experience-box">
                                <ul class="experience-list">
                                    <li>
                                        <div class="timeline-content">
                                            <h4>Addresse:</h4>
                                            <div>{{ $adr->address }}</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline-content">
                                            <h4>Zip</h4>
                                            <div>{{ $adr->zip }}</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <br>
                        <div class="education-widget">
                            <h3 class="sub-title">Horaire:</h3>
                            <div class="experience-box">
                                <ul class="experience-list">
                                    <div class="form-check">
                                        @foreach ($cals as $cal)
                                            <ul>
                                                <li>
                                                    <input class="form-check-input" type="radio" name="cal" value="{{ $cal->dt_id }}" id="cal" required>
                                                    <label class="form-check-label" for="cal">
                                                            <span>{{ explode(' ', $cal->date_time)[0] }}</span> >>> <b>{{ explode(' ', $cal->date_time)[1] }}</b>
                                                        {{-- <p>{{ $cal->date_time}}</p> --}}
                                                        {{-- <p>{{ explode(' ', $cal->date_time)[0] }}</p> 
                                                        <p>{{ explode(' ', $cal->date_time)[1] }}</p>  --}}
                                                    </label>
                                                    <br>
                                                </li>
                                            </ul>
                                        @endforeach
                                    </div>
                                </ul>
                            </div>
                        </div>
                        <br>
                        <div class="education-widget">
                            <h3 class="sub-title">Tarifs:</h3>
                            <div class="experience-box">
                                <ul class="experience-list">
                                    <div class="form-check">
                                        @foreach ($tars as $tar)
                                            <ul>
                                                <li>
                                                    <input class="form-check-input" type="radio" name="tar" value="{{ $tar->tar_id }}" id="tar" required>
                                                    <label class="form-check-label" for="tar">
                                                        <p>{{ $tar->title}}: {{ $tar->price }}</p>
                                                    </label>
                                                    <br>
                                                </li>
                                            </ul>
                                        @endforeach
                                    </div>
                                </ul>
                            </div>
                        </div>
                        <br>
                        <div class="education-widget">
                            <h3 class="sub-title">Raisons:</h3>
                            <div class="experience-box">
                                <ul class="experience-list">
                                    <div class="form-check">
                                        <textarea id="reason" type="text" class="form-control" name="reason" value="{{ old('reason') }}" rows="5" required></textarea>
                                    </div>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection