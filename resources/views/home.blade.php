@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Willkommen!') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Du bist eingeloggt! Wenn du oben links auf "Laravel" klickst, wirst du automatisch zu deiner ToDo-Liste weitergeleitet.') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
