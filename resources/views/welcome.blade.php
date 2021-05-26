@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section home-banner row-middle">
        <div class="inner-bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9">
                    <div class="banner-content">
                        <h1>{{ config('app.name', 'Laravel') }}</h1>
                        <p>Trouvez votre médecin et prenez une consultation physique chez un professionel de santé</p> 
                        <a title="Consult" class="btn btn-primary btn-lg" href="{{ route('home') }}">Consulter</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- about us section --}}
    <section id="about" class="section features">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header text-center">
                        <h3 class="header-title">Apropos de {{ config('app.name', 'Laravel') }}</h3>
                        <div class="line"></div>
                        <p>À un moment de notre vie, nous ressentons le besoin de consulter un médecin pour une maladie ou une
                            autre. Viennent ensuite les tracas liés à l'obtention d'un rendez-vous et les longues attentes à la clinique.
                            Tout cela peut être évité avec notre projet Web d'une clinique en ligne.</p>
                    </div>
                </div>
            </div>
            <div class="row feature-row">
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-img">
                            <img width="60" height="60" alt="Book an Appointment" src="{{ asset('storage/images/icon-01.png') }}">
                        </div>
                        <h4>Prenez rendez-vous</h4>
                        <p>Prenez rendez vous en ligne, 24h/24 et 7j/7, pour une consultation physique.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-img">
                            <img width="60" height="60" alt="Consult with a Doctor" src="{{ asset('storage/images/icon-02.png') }}">
                        </div>
                        <h4>Consulter un professionel de santé</h4>
                        <p>Accédez aux disponibilités de dizaines de milliers de professionnels de santé.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-img">
                            <img width="60" height="60" alt="Make a family Doctor" src="{{ asset('storage/images/icon-03.png') }}">
                        </div>
                        <h4>Retrouvez votre rendez-vous</h4>
                        <p>Retrouvez votre historique de rendez-vous et vos documents médicaux.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- services section --}}
    <section id="services" class="section departments">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header text-center">
                        <h3 class="header-title">Services</h3>
                        <div class="line"></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus
                            nec dui venenatis dignissim. Aenean vitae metus in augue pretium ultrices.
                            Duis dictum eget dolor vel blandit.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="dept-box">
                        <div class="dept-img"> 
                            <a href="department-details.html"><img width="67" height="80" alt="Dentists" src="{{ asset('storage/images/icon-04.png') }}"></a>
                        </div>
                        <h4>
                            <a href="department-details.html">Dentists</a>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dept-box">
                        <div class="dept-img"> 
                            <a href="department-details.html"><img width="63" height="80" alt="Neurology" src="{{ asset('storage/images/icon-05.png') }}"></a>
                        </div>
                        <h4><a href="department-details.html">Neurology</a></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dept-box">
                        <div class="dept-img">
                            <a href="department-details.html"><img width="92" height="80" alt="Opthalmology" src="{{ asset('storage/images/icon-06.png') }}"></a>
                        </div>
                        <h4><a href="department-details.html">Opthalmology</a></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dept-box">
                        <div class="dept-img"> 
                            <a href="department-details.html"><img width="40" height="80" alt="Orthopedics" src="{{ asset('storage/images/icon-07.png') }}"></a>
                        </div>
                        <h4><a href="department-details.html">Orthopedics</a></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dept-box">
                        <div class="dept-img"> 
                            <a href="department-details.html"><img width="76" height="80" alt="Cancer Department" src="{{ asset('storage/images/icon-08.png') }}"></a>
                        </div>
                        <h4><a href="department-details.html">Cancer Department</a></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dept-box">
                        <div class="dept-img"> 
                            <a href="department-details.html"><img width="47" height="80" alt="ENT Department" src="{{ asset('storage/images/icon-09.png') }}"></a>
                        </div>
                        <h4><a href="department-details.html">ENT Department</a></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- contact section --}}
    <section id="contact" class="contact section-bg">
    <div class="container">

        <div class="section-title">
        <h2>Nous Contacter:</h2>
        </div>

        <div class="row justify-content-center">

            <div class="col-lg-5 col-md-7">
                <form action="{{ route('contact') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Votre Nom" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required/>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Votre Email" data-rule="email" data-msg="Please enter a valid email" required/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required/>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Vous pouvez écrivez quelque chose pour nous" required></textarea>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">envoyer message</button>
                        <br>
                        <br>
                    </div>
                </form>
            </div>

        </div>

    </div>
    </section>
</div>
@endsection