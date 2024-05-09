<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <h1>Ajax Example</h1>
    <form id="formProducts">
        <input type="text" id="nombre" name="nombre" placeholder="nommbre del producto">
        <input type="number" id="precio" name="precio" placeholder="precio del producto">
        <input type="submit" value="guardar producto">
    </form>

    <div id="listaProductos"></div>

    <script>
        $(document).ready(function () {
            $("#formProducts").submit(function (event) {

                //evita que la pagina se recargue al enviar el formulario
                event.preventDefault();

                let nombre = $("#nombre").val();
                let precio = $("#precio").val();

                $.ajax({
                    url: "agregar.php",
                    method: "POST",
                    data: {
                        nombre: nombre,
                        precio: precio
                    },
                    success: function (response) {
                        console.log(response);
                    },
                    error: function (status, error) {
                        console.log("Error al agregar el producto", status, error);
                    }
                })
            })
            // Cargar lista de productos cuando se carga la pagina
            cargarListaProductos();


        })



        // Funcion para cargar la lista de productos
        function cargarListaProductos() {
            $.ajax({
                url: 'obtener.php',
                method: 'GET',
                success: function (response) {
                    $('#listaProductos').html(response)
                },
                error: function (status, error) {
                    console.log("Error al cargar los productos, ", status, error)
                }
            })
        }
    </script>
</body>

</html>