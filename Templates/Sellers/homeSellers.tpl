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

  <div class="container">
      <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Vendedor</th>
          <th scope="col">Legajo</th>
        </tr>
      </thead>
      {foreach from=$sellers item=$seller}
      <tbody>
        <tr>
          <th>{$seller->id_vendedor}</th>
          <td><a href="getSeller/{$seller->id_vendedor}">{$seller->nombre}</a></td>
          <td>#{$seller->legajo}

          <a href="deleteSeller/{$seller->id_vendedor}"><button type="button" class="btn btn-danger">Eliminar</button></a> 
          <a href="viewEditSeller/{$seller->id_vendedor}"><button type="button" class="btn btn-danger">Cambiar</button></a> 
        </tr>
      </tbody>
    {/foreach} 
    </table>
 
</div>
{include file="Templates/footer.tpl"}