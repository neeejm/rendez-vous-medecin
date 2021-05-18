@extends('layouts.app')

@section('head_content')
    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap-select.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap-select.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">{{ __('Postulation') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('apply') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('Prenom') }}</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="fname" autofocus>

                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lname" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>

                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Addresse email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmation mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_num" class="col-md-4 col-form-label text-md-right">{{ __('Numero de telephone') }}</label>

                            <div class="col-md-6">
                                <input id="phone_num" type="tel" class="form-control @error('phone_num') is-invalid @enderror" name="phone_num" value="{{ old('phone_num') }}" placeholder = "0710158769" required autocomplete="phone_num" autofocus>

                                @error('phone_num')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fax_num" class="col-md-4 col-form-label text-md-right">{{ __('Numero de fax') }}</label>

                            <div class="col-md-6">
                                <input id="fax_num" type="tel" class="form-control @error('fax_num') is-invalid @enderror" name="fax_num" value="{{ old('fax_num') }}" placeholder = "0510158769" autocomplete="fax_num" autofocus>

                                @error('fax_num')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Spécilaté') }}</label>
                            <div class="col-md-6">
                                <select class="selectpicker form-control" name="sps[]" multiple data-live-search="true" >
                                    @foreach ($sps as $item)
                                        <option value="{{ $item->sp_id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Ville') }}</label>
                            <div class="col-md-6">
                                <select class="selectpicker form-control" name="city">
                                    @foreach ($cs as $item)
                                        <option value="{{ $item->ci_id }}">{{ $item->city }}</option>
                                    @endforeach
                                  </select>
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Addresse') }}</label>

                            <div class="col-md-6">
                                <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder = "Exemple: 11, Avenue du 16 Novembre" required autocomplete="address" autofocus></textarea>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="zip" class="col-md-4 col-form-label text-md-right">{{ __('Zip') }}</label>

                            <div class="col-md-6">
                                <input id="zip" class="form-control @error('zip') is-invalid @enderror" name="zip" value="{{ old('zip') }}" placeholder = "10100" required autocomplete="zip" autofocus>

                                @error('zip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Sexe') }}</label>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <label for="male" class="form-check-input">{{ __('Homme') }}</label>
                                    <input id="male" type="radio" class="form-check-label"  name="gender" value="1" required>
                                    
                                </div>
                                <div class="form-check">
                                    <label for="female" class="form-check-input">{{ __('Femme') }}</label>
                                    <input id="female" type="radio" class="form-check-label"  name="gender" value="0" required>
                                </div>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                          
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Postuler') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 