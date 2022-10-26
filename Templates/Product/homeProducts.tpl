{include file="Templates/header.tpl"}

<div class="container-nav">

<nav class="navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="home">Brumilda</a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href='home'>Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href='sellersHome'>Vendedores</a>
        </li>
      </ul>
      {if !isset($smarty.session.readyLogged)}
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Registrarte!</strong> podras Agregar/Eliminar/Editar.
              <button type="button" class="button-nav" data-bs-dismiss="alert" aria-label="Close">X</button>
        </div>
        <a href="login"><button type="button" class="btn btn-primary">Login</button></a> 
      {/if}
      
      {if isset($smarty.session.readyLogged)}
        <a href="logout"><button type="button" class="btn btn-primary">Deslogeate</button></a> 
      {/if}
      </nav>
  </div>
</div>


<div class="container">

<div class="divForm">
  <form action="createHomeProduct" method="POST" class="formulario">

    <label for="validationCustom01" class="form-label">Vendedores</label>
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
      <textarea type="text" class="form-control" name="descripcion" id="descripcion"  required></textarea>
    </div>

    <div class="col-md-4">
      <label for="validationCustom03" class="form-label">Precio</label>
      <input type="text" class="form-control" name="precio" id="precio" required>
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>



    <table class="table">
      <thead>
        <tr>
          <th scope="col">Vendedor</th>
          <th scope="col">Tipo</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Precio</th>
          <th scope="col">Eliminar</th>
          {if isset($smarty.session.readyLogged)}
          <th scope="col">Editar</th>
        {/if}
        </tr>
      </thead>
      {foreach from=$products item=$product}
      <tbody>
        <tr>
          <th>{$product->nombre} Id:{$product->id_vendedor}</th>
          <td><a href="getProduct/{$product->id_producto}">{$product->tipo}</a></td>
          <td>{$product->descripcion}</td>
          <td>${$product->precio}</td> 
          <td><a href="deleteProduct/{$product->id_producto}"><button type="button" class="btn btn-danger">Eliminar</button></a></td> 
          {if isset($smarty.session.readyLogged)}
            <td><a href="getProduct/{$product->id_producto}"><button type="button" class="btn btn-danger">Editar</button></a></td> 
          {/if}
        </tr>
      </tbody>
    {/foreach} 
    </table>
 
</div>
{include file="Templates/footer.tpl"}