{include file="Templates/header.tpl"}  


<form action="editSeller" method="POST" class="formulario">


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
<input type="number" class="form-control" name="legajo" id="legajo" required>
</div>


<a href="editSeller"><button type="button"  class="btn btn-danger">Cambiar</button></a> 
</form>
