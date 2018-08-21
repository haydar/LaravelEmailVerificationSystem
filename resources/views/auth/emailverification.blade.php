@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    {{"We sent verification to your e-mail. Please confirm your account and sign in."}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
