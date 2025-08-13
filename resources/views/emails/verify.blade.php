@component('mail::message')
# Account Verification

Thank you for registering!

Your verification code is:

**{{ $code }}**

Please enter this code in the verification form to activate your account.

Thanks,  
{{ config('app.name') }}
@endcomponent
