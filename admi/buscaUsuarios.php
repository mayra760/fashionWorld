<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<br><br><div class="card" id="card_busUser">
    <div class="card-content" id="car_cont">
      <h2>Buscar por ID</h2>
      <form onsubmit="buscarUser(event)" method="post" id="on_bus">
        <div class="form-group"id="
        ">
          <label for="id_producto">ingresa el nombre del usuario:</label>
          <input type="number" id="id_persona" name="busqueda">
        </div>
        <input type="submit" value="buscar"><br>
      </form>
    </div>
  </div>
  <p id="personas"></p>

  <div class="row" id="idDato">
    <?php
        
    ?>
  </div>

</body>
</html>