{include file="Templates/header.tpl"}  
<div class="container">
<form action='editProduct'method="POST">
<div class="row">
    <div class="col">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Tipo</label>
            <input name="tipo" type="text" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Descripcion</label>
            <textarea name="descripcion" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Precio</label>
            <input  name="precio" type="text" class="form-control" id="exampleInputPassword1">
        </div>
    </div>    

    <a href="editProduct"><button type="button" class="btn btn-danger">Cambiar</button></a> 
    
    </form>
</div> 