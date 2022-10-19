{include file="Templates/header.tpl"}  
<div class="container">

<form action='editProduct' method="POST" enctype="multipart/form-data">



<div class="col-md-4">
<input type="hidden" name="tipo" value="{$tipo}">
</div>

<div class="col-md-4">
<label for="validationCustom02" class="form-label">Descripcion</label>
<input type="text" class="form-control" name="descripcion" id="descripcion" value="{$descripcion}" required>
</div>

<div class="col-md-4">
<label for="validationCustom03" class="form-label">Precio</label>
<input type="text" class="form-control" name="precio" id="precio" value="{$precio}" required>
</div>   

<a href="editProduct"><button class="btn btn-primary" type="submit">Submit form</button></a>
    
    </form>
</div> 
{include file="Templates/footer.tpl"} 