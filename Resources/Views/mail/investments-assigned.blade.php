@component('mail::message')

@if($investments->count() > 0)
Tus inversiones asignadas fueron modificadas. Ahora tiene permiso para visualizar el detalle de las siguientes:

<ul>
@foreach($investments as $investment)
<li>{{ $investment->name }} ({{ url('/investments', $investment->id) }})</li>
@endforeach
</ul>

@else
Ya no tiene inversiones asignadas para visualizar.
@endif


Gracias,<br>
El equipo de {{ config('app.name') }}
@endcomponent
