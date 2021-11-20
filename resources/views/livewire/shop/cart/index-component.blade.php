<div>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <thead class="text-center">
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart_items->sortBy('id') as $item  )
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td class="text-center">
                            <input type="number"
                                id="v{{ $item->id }}"
                                wire:change="update_quantity({{ $item->id }},
                                $('#v' + {{ $item->id }}).val())"
                                class="form-control"
                                value="{{ $item->quantity }}">
                        </td>
                        <td class="text-center">
                            ${{
                                number_format(Cart::session(auth()->id())
                                ->get($item->id)
                                ->getPriceSum(),2)
                            }}
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-danger"
                                wire:click="delte_item({{ $item->id }})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h3>Total:
                ${{
                    number_format(Cart::session(auth()->id())
                    ->getTotal(),2)
                }}
        </h3>
        <a href="{{ route('checkout') }}" class="btn btn-success">Pagar...</a>
    </div>
</div>
