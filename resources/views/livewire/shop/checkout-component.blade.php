<div>
    <div class="container">
        <div class="form-group">
          <label for="">Nombre Completo</label>
          <input type="text" name="" id="" class="form-control @error('fullname') is-invalid
            @enderror" placeholder="Nombres y Apellidos" wire:model="fullname">
          @error('fullname')
              <span class="invalid-feedback" role="alert">
                <strong>{{ message }}</strong>
              </span>
          @enderror
        </div>
        <div class="form-group">
            <label for="">Departamento</label>
            <input type="text" name="" id="" class="form-control @error('state') is-invalid
             @enderror" placeholder="Nombres y Apellidos" wire:model="state">
            @error('state')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Ciudad</label>
            <input type="text" name="" id="" class="form-control @error('city') is-invalid
                @enderror" placeholder="Nombres y Apellidos" wire:model="city">
            @error('city')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Código Postal</label>
            <input type="text" name="" id="" class="form-control @error('zipcode') is-invalid
                @enderror" placeholder="Nombres y Apellidos" wire:model="zipcode">
            @error('zipcode')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Dirección</label>
            <input type="text" name="" id="" class="form-control @error('address') is-invalid
                @enderror" placeholder="Nombres y Apellidos" wire:model="address">
            @error('address')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Número Contacto</label>
            <input type="text" name="" id="" class="form-control @error('phone') is-invalid
             @enderror" placeholder="Nombres y Apellidos" wire:model="phone">
            @error('phone')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
            <label class="form-check-label" for="flexRadioDefault1">
              cash_on_delivery
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
            <label class="form-check-label" for="flexRadioDefault2">
              paypal
            </label>
          </div>

        <button type="button" class="btn btn-success" wire:click='make_order'>
            Realizar Pedido...
        </button>
    </div>
</div>
