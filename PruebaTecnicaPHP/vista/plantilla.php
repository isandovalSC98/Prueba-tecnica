<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>PruebaTecnicaDesis</title>
</head>
<body>

    <div class="contenedor">
        <div id="titulo">
            <h1>Formulario de Producto</h1>
        </div>

        <form class="form-container">

            <div class="form-row">
                <div class="form-group">
                    <label>Codigo</label>
                    <input type="text" id="txtCodigo">
                </div>

                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" id="txtNombre">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Bodega</label>
                    <select id="bodega" name="bodega">
                        <option value=""></option>
                        <?php 
                            foreach ($bodegas as $key => $bodega) {
                                ?>
                                    <option value="<?php echo $bodega['id_bodega'] ?>"><?php echo $bodega['nombre_bodega'] ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Sucursal</label>
                    <select id="sucursal" name="sucursal">
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Moneda</label>
                    <select id="moneda" name="moneda">
                        <option value=""></option>
                        <?php
                            foreach ($monedas as $key => $moneda) {
                                ?>
                                    <option value="<?php echo $moneda['nombre_moneda'] ?>"><?php echo $moneda['nombre_moneda'] ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Precio</label>
                    <input type="text" name="" id="txtPrecio">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Material del producto</label>
                </div>
            </div>

            <div class="form-row">
                <input type="checkbox"  name="material" value="Plastico">
                <label>Plastico</label>
                <input type="checkbox"  name="material" value="Metal">
                <label>Metal</label>
                <input type="checkbox"  name="material" value="Madera">
                <label>Madera</label>
                <input type="checkbox"  name="material" value="Vidrio">
                <label>Vidrio</label>
                <input type="checkbox"  name="material" value="Textil">
                <label>Textil</label>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <textarea id="descripcionProducto" name="w3review" rows="4" cols="50"></textarea>
                </div>
            </div>
            
        </form>
        <br><br>
        <div class="boton">
            <button type="button" id="btnGuardar">Guardar Producto</button>
        </div>

    </div>
    <script src="public/js/jquery.js"></script>
    <script src="public/js/index.js"></script>
    
</body>
</html>
