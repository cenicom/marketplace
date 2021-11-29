@component('mail::message')
# Introduction

Por Favor Activar la Tienda Creada. Aquí están los Detalles de la Tienda.
Nombre de la Tienda: {{ $shop->name }}
Dueño de la Tienda: {{ $shop->owner->name }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
