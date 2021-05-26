<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-4 col-xl-4 doctor-sidebar">
                <div class="doctor-list doctor-view">
                    <div class="doctor-inner">
                        <div class="container m-4">
                            <div class="doctor-info">
                                <h4 class="doctor-name">{{ ucwords(Auth::user()->username) }}</h4>
                            </div>
                            <div class="book-appointment"> 
                                <ul>
                                    <li>
                                        <a href="{{ route('profile.history') }}">Historique</a>
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
                                    <div>{{ ucwords($client->fname . ' ' . $client->lname) }}</div>
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
                                    <div>{{ ucwords(($client->gender == 0) ? 'femme' : 'homme') }}</div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-content">
                                    <h4>Numero de téléphone:</h4>
                                    <div>{{ $client->phone_num }}</div>
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