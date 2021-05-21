@extends('layouts.app')

@section('content')
<div class="main-content account-content">
    <div class="content">
        <div class="container">
            <div class="account-box">

                <form method="POST" action="{{ route('apply') }}">
                    @csrf

                    <div class="account-title">
                            <h3>Postulation</h3>
                    </div>
                    <div class="form-group">
                        <label for="fname">{{ __('Prenom') }}</label>

                            <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="fname" autofocus>

                            @error('fname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="lname">{{ __('Nom') }}</label>

                            <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>

                            @error('lname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="username">{{ __('Username') }}</label>

                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">{{ __('Addresse email') }}</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">{{ __('Mot de passe') }}</label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">{{ __('Confirmation mot de passe') }}</label>

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="form-group">
                        <label for="phone_num">{{ __('Numero de téléphone') }}</label>

                            <input id="phone_num" type="tel" class="form-control @error('phone_num') is-invalid @enderror" name="phone_num" value="{{ old('phone_num') }}" placeholder = "0710158769" required autocomplete="phone_num" autofocus>

                            @error('phone_num')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="fax_num">{{ __('Numero de fax') }}</label>

                            <input id="fax_num" type="tel" class="form-control @error('fax_num') is-invalid @enderror" name="fax_num" value="{{ old('fax_num') }}" placeholder = "0510158769" autocomplete="fax_num" autofocus>

                            @error('fax_num')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label>{{ __('Spécilaté') }}</label>
                            <select class="selectpicker form-control" name="sps[]" multiple data-live-search="true" >
                                @foreach ($sps as $item)
                                    <option value="{{ $item->sp_id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                    </div> 

                    <div class="form-group">
                        <label>{{ __('Ville') }}</label>
                            <select class="selectpicker form-control" name="city">
                                @foreach ($cs as $item)
                                    <option value="{{ $item->ci_id }}">{{ $item->city }}</option>
                                @endforeach
                                </select>
                    </div> 

                    <div class="form-group">
                        <label for="address">{{ __('Addresse') }}</label>

                            <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder = "Exemple: 11, Avenue du 16 Novembre" required autocomplete="address" autofocus></textarea>

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="zip">{{ __('Zip') }}</label>

                            <input id="zip" class="form-control @error('zip') is-invalid @enderror" name="zip" value="{{ old('zip') }}" placeholder = "10100" required autocomplete="zip" autofocus>

                            @error('zip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label>{{ __('Sexe') }}</label>

                            <div class="form-check">
                                <label for="male">{{ __('Homme') }}</label>
                                <input id="male" type="radio" class="form-check-label"  name="gender" value="1" required>
                                
                            </div>
                            <div class="form-check">
                                <label for="female">{{ __('Femme') }}</label>
                                <input id="female" type="radio" class="form-check-label"  name="gender" value="0" required>
                            </div>

                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                        
                    <div class="form-group form-check">
                        <label>
                        <input type="checkbox" required> J'ai accepté les termes et conditions</label>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary account-btn">
                            {{ __('Postuler') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection 