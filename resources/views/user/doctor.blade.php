@if (App\Models\Doctor::where('user_id', Auth::user()->user_id)->first()->is_valid)

    {{ __('This is doc profile!') }}
    <br>
    <a href="{{ route('profile.calendar') }}">editer calendrier</a>
    <br>
    <a href="{{ route('profile.tarif') }}">editer tarif</a>
    <br>
    <a href="{{ route('profile.rv') }}">demande de rendez-vous</a>

@else
    {{ __('Not yet approved, doc!') }}

@endif
{{-- {{ App\Models\Doctor::where('user_id', Auth::user()->user_id)->first()->is_valid  }} --}}
