@component('mail::message')
# با عرض سلام خسته نباشید در جواب به این موضوع : {{$subject}}

{{$description}}

سپاس گذارم,<br>
{{ config('app.name') }}
@endcomponent
