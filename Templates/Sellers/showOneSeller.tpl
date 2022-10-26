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
  <div class="destacado">
    <h1>ID: {$seller->id_vendedor}</h1>
    <h2>Nombre: {$seller->nombre}</h2>
    <h3>Legajo: {$seller->legajo}</h3>
    <a href="home">Home</a>
    <a href="sellersHome">Vendedores</a>
  </div>

{if isset($smarty.session.readyLogged)}
{include file="Sellers/formEditSeller.tpl"}
{/if}
{include file="Templates/footer.tpl"}
