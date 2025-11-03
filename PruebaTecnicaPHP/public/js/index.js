    let cmbBodega = document.getElementById('bodega');
    let bodega;

    cmbBodega.addEventListener("change", (event) => {
        bodega = cmbBodega.value;
        console.log("valor: "+bodega);
        if(bodega == "")
        {
            $('#sucursal').empty();
            $('#sucursal').append('<option value=""></option>');
        }else{
            $.ajax({
                type: 'POST',
                url: 'http://localhost/PruebaTecnicaPHP/index.php?accion=obtenerSucursalPorId',
                data: {id_bodega: bodega},
                dataType: 'json',
                success: function (data) {
                    
                    $('#sucursal').empty();
                    $('#sucursal').append('<option value=""></option>');

                    data.forEach(function(sucursal) {
                        var option = $('<option></option>').attr('value', sucursal.id_sucursal).text(sucursal.nombre_sucursal);
                        $('#sucursal').append(option);
                    })
                    
                }
            });
        }

    });

    document.getElementById("btnGuardar").addEventListener("click", function()
    {
        const txtCodigo = document.getElementById('txtCodigo');
        const codigo = txtCodigo.value;

        const txtNombre = document.getElementById('txtNombre');
        const nombre = txtNombre.value;

        const txtPrecio = document.getElementById('txtPrecio');
        const precio = txtPrecio.value;



        let cmbSucursal = document.getElementById('sucursal');
        let sucursal = cmbSucursal.value;

        let cmbMoneda = document.getElementById('moneda');
        let moneda = cmbMoneda.value;

        const txtAreaDescrip = document.getElementById('descripcionProducto');
        const descripcion = txtAreaDescrip.value;

        const exp = /^[0-9a-zA-Z]+$/;
        const expPrecio = /^\d+(\.\d{1,2})?$/;
        var contador = 0;
        const checkboxes = document.getElementsByName("material");

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                contador++;
            }
        }
        
        if (codigo.length == 0) {
            alert("El código del producto no puede estar en blanco.");
        }else if(codigo.length <5 || codigo.length >15){
            alert("El código del producto debe tener entre 5 y 15 caracteres.")
        }
        else if(!exp.test(codigo))
        {
            alert("El código del producto debe contener letras y números");

        }else{

            if (nombre.length == 0) {
                alert("El nombre del producto no puede estar en blanco.");
            }else if(nombre.length <2 || nombre.length > 50){
                alert("El nombre del producto debe tener entre 2 y 50 caracteres.");
            }else{

                if (precio.length == 0) {
                    alert("El precio del producto no puede estar en blanco.");
                }
                else if(!expPrecio.test(precio))
                {
                    alert("El precio del producto debe ser un número positivo con hasta dos decimales.");
                }
                else{
                    
                    if (bodega == "") {
                        alert("Debe seleccionar una bodega.");
                    }else{
                        
                        if (sucursal == "") {
                            alert("Debe seleccionar una sucursal para la bodega seleccionada.");
                        }else{
                            if (moneda == "") {
                                alert("Debe seleccionar una moneda para el producto.")
                            }else{
                                if (descripcion.length == 0) {
                                    alert("La descripción del producto no puede estar en blanco");
                                }else if(descripcion.length < 9 || descripcion.length >1000){
                                    alert("La descripción del producto debe tener entre 10 y 1000 caracteres.");
                                }else{
                                    if (contador < 2) {
                                        alert("Debe seleccionar al menos dos materiales para el producto.");
                                    }else{
                                        console.log("bodega: "+bodega, "sucursal: "+sucursal);
                                        
                                        $.ajax({
                                        type: 'POST',
                                        url: 'http://localhost/PruebaTecnicaPHP/index.php?accion=validaCodigoExistente',
                                        data: {codigo: codigo},
                                        dataType: 'json',
                                            success: function (data) {
                                                
                                                if (data === true) {
                                                    alert("El código del producto ya está registrado.")
                                                }else{
                                                    
                                                    $.ajax({
                                                    type: 'POST',
                                                    url: 'http://localhost/PruebaTecnicaPHP/index.php?accion=envioDatos',
                                                    data: {codigo: codigo, nombre: nombre, bodega: bodega, sucursal: sucursal, moneda: moneda, precio: precio, descripcion: descripcion},
                                                    dataType: 'json',
                                                        success: function (data) {
                                                            
                                                            if (data == "OK") {
                                                                alert("Producto ingresado correctamente")
                                                            }else{
                                                                alert("Error al ingresar producto")
                                                            }
                                                            
                                                        }
                                                    });
                                                }
                                                
                                            }
                                        });


                                    }
                                }
                            }
                            
                        }
                        
                    }
                }
            }
        }

    });

