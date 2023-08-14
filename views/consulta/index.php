<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App</title>
    <link rel="stylesheet" href="public/css/main.css">
</head>
<body>
    <?php require 'views/header.php'; ?>
    <h1>Pagina Consulta</h1>
    <div>
        <!-- <?= var_dump($this->alumnos) ?> -->
        <table>
            <thead>
                <th>Id</th>
                <th>Matricula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Editar</th>
                <th>Desactivar</th>
            </thead>
            <tbody>
                <?php foreach($this->alumnos as $row){
                    $alumno = new Alumno();
                    $alumno = $row;
                               
                ?>
                <tr>
                    <td><?= $alumno->id ?></td>
                    <td><?= $alumno->matricula ?></td>
                    <td><?= $alumno->nombre ?></td>
                    <td><?= $alumno->apellido ?></td>
                    <td><a href="#">Editar</a></td>
                    <td><a href="#">Eliminar</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php require 'views/footer.php'; ?>
</body>
</html>