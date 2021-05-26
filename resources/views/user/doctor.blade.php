@if (App\Models\Doctor::where('user_id', Auth::user()->user_id)->first()->is_valid)
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-4 col-xl-4 doctor-sidebar">
                <div class="doctor-list doctor-view">
                    <img class="img-fluid" alt="" src="{{ ($doc->gender == 0) ? asset('storage/images/fdoctor.png') :  asset('storage/images/mdoctor.png')}}" height="400" width="480">
                    <div class="doctor-inner">
                        <div class="container m-4">
                            <div class="doctor-info">
                                <h4 class="doctor-name">{{ ucwords(Auth::user()->username) }}</h4>
                            </div>
                            <div class="book-appointment"> 
                                <ul>
                                    <li>
                                        <a href="{{ route('profile.calendar') }}">editer horaires</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('profile.tarif') }}">editer tarifs</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('profile.rv') }}">Calendrier</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8 col-lg-8 col-xl-8">
                <div class="education-widget">
                    <h3 class="sub-title">Info:</h3>
                    <div class="experience-box">
                        <ul class="experience-list">
                            <li>
                                <div class="timeline-content">
                                    <h4>Nom complet:</h4>
                                    <div>{{ ucwords($doc->fname . ' ' . $doc->lname) }}</div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-content">
                                    <h4>Email:</h4>
                                    <div>{{ Auth::user()->email }}</div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-content">
                                    <h4>Sexe:</h4>
                                    <div>{{ ucwords(($doc->gender == 0) ? 'femme' : 'homme') }}</div>
                                </div>
                            </li>
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
            </div>
        </div>
    </div>
</div>

@else
    {{ __('Pas encore accorder, docteur!') }}

@endif
{{-- {{ App\Models\Doctor::where('user_id', Auth::user()->user_id)->first()->is_valid  }} --}}
