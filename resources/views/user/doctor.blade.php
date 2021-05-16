@if (App\Models\Doctor::where('user_id', Auth::user()->user_id)->first()->is_valid)
    {{ __('This is doc profile!') }}

@else
    {{ __('Not yet approved, doc!') }}

@endif
{{-- {{ App\Models\Doctor::where('user_id', Auth::user()->user_id)->first()->is_valid  }} --}}
