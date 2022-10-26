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
        <a href="login"><button type="button" class="btn btn-primary">Iniciar sesión</button></a> 
      {/if}
      
      {if isset($smarty.session.readyLogged)}
        <a href="logout"><button type="button" class="btn btn-primary">Cerrar sesión</button></a> 
      {/if}
      </nav>
  </div>
</div>



<div class="container">
<div class="divForm">
  <form action="createHomeSeller" method="POST" class="formulario">

    <div class="col-md-4">
      <label for="validationCustom01" class="form-label">ID</label>
      <input type="text" class="form-control" name="id_vendedor" id="id_vendedor" required>
    </div>

    <div class="col-md-4">
      <label for="validationCustom02" class="form-label">Nombre</label>
      <input type="text" class="form-control" name="nombre" id="nombre"  required>
    </div>

    <div class="col-md-4">
      <label for="validationCustom03" class="form-label">Legajo</label>
      <input type="text" class="form-control" name="legajo" id="legajo" required>
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
  </div>  




      <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Vendedor</th>
          <th scope="col">Legajo</th>
          <th scope="col">Eliminar</th>
          {if isset($smarty.session.readyLogged)}
          <th scope="col">Editar</th>
        {/if}
        </tr>
      </thead>
      {foreach from=$sellers item=$seller}
      <tbody>
        <tr>
          <th>{$seller->id_vendedor}</th>
          <td><a href="getSeller/{$seller->id_vendedor}">{$seller->nombre}</a></td>
          <td>#{$seller->legajo}
          <td><a href="deleteSeller/{$seller->id_vendedor}"><button type="button" class="btn btn-danger">Eliminar</button></a></td> 
          {if isset($smarty.session.readyLogged)}
          <td><a href="getSeller/{$seller->id_vendedor}"><button type="button" class="btn btn-danger">Cambiar</button></a></td>
        {/if}
          </tr>
      </tbody>
    {/foreach} 
    </table>
 
</div>
{include file="Templates/footer.tpl"}