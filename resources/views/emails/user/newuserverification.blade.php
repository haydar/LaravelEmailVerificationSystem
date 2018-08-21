@component('mail::message')
# Welcome to {{ config('app.name') }}

Hello {{$user->name}},<br>
One step left to begin using our services.

@component('mail::button', ['url' => route('user.verifyEmail',[
    'email'=>$user->email,
    'token'=>$user->userverification->token])])
Verify Your Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
