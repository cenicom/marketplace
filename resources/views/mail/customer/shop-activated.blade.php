@component('mail::message')
# Introduction

Felicitaciones, su Nueva Tienda Ya Está Activada.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
