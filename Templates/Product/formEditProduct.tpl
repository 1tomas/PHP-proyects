<div class="container">
    <form action='editProduct/{$product->id_producto}' method="POST" >

    <select class="form-select" name="id_vendedor_fk">
        {foreach from=$sellers item=$seller}
            <option selected value="{$seller->id_vendedor}">{$seller->nombre}-{$seller->id_vendedor}</option>
        {/foreach} 
    </select>

    <div class="col-md-4">
        <label for="validationCustom02" class="form-label">Tipo</label>
        <input type="text" class="form-control" name="tipo" id="tipo" value="{$product->tipo}" >
    </div>


    <div class="col-md-4">
        <label for="validationCustom02" class="form-label">Descripcion</label>
        <input type="text" class="form-control" name="descripcion" id="descripcion" value="{$product->descripcion}" >
    </div>

    <div class="col-md-4">
        <label for="validationCustom03" class="form-label">Precio</label>
        <input type="text" class="form-control" name="precio" id="precio" value="{$product->precio}" >
    </div>
    
    <button class="btn btn-primary" type="submit">Editar</button>
        
    </form>
</div> 
