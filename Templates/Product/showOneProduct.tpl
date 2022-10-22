{include file="header.tpl"}
    
    <h1>ID:{$product->id_vendedor_fk}</h1> 
    <h2>Tipo:{$product->tipo}</h2>
    <h3>Descripcion:{$product->descripcion}</h3>
    <h3>Precio: ${$product->precio}</h3>
    <a href="home">Volver</a>
 
{include file="Product/formEditProduct.tpl"}
{include file="footer.tpl"}


