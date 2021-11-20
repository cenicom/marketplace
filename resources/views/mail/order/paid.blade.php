@component('mail::message')
# Introduction

Gracias por la Compra.

Aquí está su Recibo

<table class="table table-bordered table-estriped">
    <thead>
        <tr>
            <th class="text-center">Nombre</th>
            <th class="text-center">Cantidad</th>
            <th class="text-center">Precio</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order->items as $item )
            <tr>
                <td scope="row">{{ $item->name }}</td>
                <td>{{ $item->pivot->quantity }}</td>
                <td>{{ $item->pivot->price }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

Total : $ {{ $order->total }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
