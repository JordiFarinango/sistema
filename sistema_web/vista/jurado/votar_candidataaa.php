<!doctype html>
<html lang="en">
<html>
    <head>
        <title>Calificar</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../../libs/bootstrap-5.3.1/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script src="../../libs/jquery.min.js"></script>
        <script src="../../libs/bootstrap-5.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="../../libs/ajax.js"></script>
    </head>
    <body onload="buscar_parametros('');">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Ingrese una nota para calificar:</h2>
                    <div class="d-flex justify-content-end mb-3">
                        <a href="jurado.html" class="btn btn-secondary me-2">Regresar</a>
                    </div>
                    <table id="tabla_parametros" name="tabla_parametros" class="table table-bordered">
                        <thead class="bg-primary text-light">
                            <tr>
                                <th>N.</th>
                                <th>Coreografía</th>
                                <th>Traje Típico</th>
                                <th>Traje de Gala</th>
                                <th>Respuesta a la pregunta</th>
                            </tr>
                        </thead>
                        <tbody id="tabla_parametros_cuerpo">
                            <!-- Las filas serán agregadas aquí por AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
