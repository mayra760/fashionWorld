<br><br><b>
<form action="ctroAdmi.php?ediPro=ola&dato=<?php echo $_GET['dato']; ?>" class="row g-3" method="post" >
<center><div class="col-auto">
  <div class="col-auto">
    <input type="text" name="nombre" class="form-control" id="producto" placeholder="Nombre Producto" value="<?php if(isset($_GET['dato']))echo Productos::datoPro(1,$_GET['dato'])  ?>">
  </div><br>
  <div class="col-auto">
    <input type="text" name="precio" class="form-control" id="precio" placeholder="precio" value="<?php if(isset($_GET['dato']))echo Productos::datoPro(2,$_GET['dato'])  ?>">
  </div><br>
  <div class="col-auto">
    <input type="text" name="cantidad" class="form-control" id="cantidad" placeholder="cantidad" value="<?php if(isset($_GET['dato'])) echo Productos::datoPro(3,$_GET['dato']) ?>">
  </div><br>
  <div class="col-auto">
    <input type="text" name="detalles" class="form-control" id="detalles" placeholder="Detalles" value="<?php if(isset($_GET['dato'])) echo Productos::datoPro(4,$_GET['dato']) ?>">
  </div><br>
  Imagen: <br>
  <img id="imagenProH" src="<?php if(isset($_GET['dato'])) echo Productos::datoPro(5,$_GET['dato']) ?>" alt="Imagen del producto" style="max-width: 300px; max-height: 300px;">
  <input type="file" id="imagen" name="imagen" accept="image/*" onchange="previewImage()" > <br><br>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Actualizar Producto</button>
  </div></center>
</form>
<script src="../js/imgPrevia.js"></script>



<!-- enctype="multipart/form-data" -->

