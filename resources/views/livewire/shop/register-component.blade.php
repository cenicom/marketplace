<div>
    <div class="container">
        <div class="form-group mb-3">
            <h1>Registrar Tienda</h1>
        </div>
        <div class="form-group mb-3">
            <label for="">Nombre:</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror"  wire:model="name">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="">Descripción:</label>
            <textarea class="form-control @error('description') is-invalid @enderror" rows="3"
                wire:model="description"></textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group mb-3">
            <button type="button" class="btn btn-primary" wire:click="registerShop()">
                Registrar
            </button>
        </div>
    </div>
</div>
