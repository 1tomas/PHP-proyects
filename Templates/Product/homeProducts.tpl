{include file="Templates/header.tpl"}

<div class="container">
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="home">Brumilda</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href='home'>Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href='sellersHome'>Vendedores</a>
        </li>
      </ul>
      <a href="logout"><button type="button" class="btn btn-primary">Deslogeate</button></a> 
    </div>
  </div>
</div>


<div class="container">
  <form action="createHomeProduct" method="POST" class="formulario">

    <select class="form-select" name="id_vendedor_fk">
      {foreach from=$sellers item=$seller}
          <option selected value="{$seller->id_vendedor}">{$seller->nombre}-{$seller->id_vendedor}</option>
      {/foreach} 
    </select>

    <div class="col-md-4">
      <label for="validationCustom01" class="form-label">Tipo</label>
      <input type="text" class="form-control" name="tipo" id="tipo" required>
    </div>

    <div class="col-md-4">
      <label for="validationCustom02" class="form-label">Descripcion</label>
      <input type="text" class="form-control" name="descripcion" id="descripcion"  required>
    </div>

    <div class="col-md-4">
      <label for="validationCustom03" class="form-label">Precio</label>
      <input type="text" class="form-control" name="precio" id="precio" required>
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>




    <table class="table">
      <thead>
        <tr>
          <th scope="col">Vendedor</th>
          <th scope="col">Tipo</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Precio</th>
        </tr>
      </thead>
      {foreach from=$products item=$product}
      <tbody>
        <tr>
          <th>{$product->nombre}-{$product->id_vendedor}</th>
          <td>{$product->tipo}</a></td>
          <td>{$product->descripcion}</td>
          <td>${$product->precio}
          <a href="deleteProduct/{$product->id_producto}"><button type="button" class="btn btn-danger">Eliminar</button></a> 

          <a href="getProduct/{$product->id_producto}"><button type="button" class="btn btn-danger">Cambiar</button></a> 
        </tr>
      </tbody>
    {/foreach} 
    </table>
 
</div>
{include file="Templates/footer.tpl"}