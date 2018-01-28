@component('mail::message')
# Störungsmitteilung - {{ $deviceName }}

Für das Gerät **{{ $deviceName }}** wurden folgende Störungen eingereicht:
{{ $optionalText }}

@component('mail::table')
| Störungen |
|---|
@foreach ($incidents as $incident)
| {{ substr($incident,2,sizeof($incident)-3) }} |
    @endforeach
    | {{ $optionalText }} |
@endcomponent

@component('mail::button', ['url' => env('APP_URL')])
Zum Dashboard
@endcomponent

Mit freundlichen Grüßen<br><br>
{{ config('app.name') }}
@endcomponent
