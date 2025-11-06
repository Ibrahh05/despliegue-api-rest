<?php 
    // DETECCIÓN AUTOMÁTICA DEL ENTORNO
    // En producción: backend (contenedor Docker)
    // En desarrollo: host.docker.internal (tu IDE)
    $backend_host = gethostbyname('backend') === 'backend' ? 'backend' : 'host.docker.internal';
    $base_url = "http://$backend_host:8080";
    
    // URL para listar mascotas
    $url = "$base_url/coche/list";
    $data = @file_get_contents($url);
    $coches = json_decode($data, true) ?? [];
?>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <title>Listado de coches</title>
    </head>
    <body>
        <table class="table table-striped">
                <thead>
                <h1 style="text-align: center;">Listado de coches</h1>
                <br>
                    <tr>
                        <td>ID</td>
                        <td>Nombre</td>
                        <td>Fecha fabricacion</td>
                        <td>Categoria</td>
                        <td>Precio</td>
                        <td>Comprar</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($coches as $coche): ?>
                        <tr>
                            <td><?php echo $coches['id'] ?></td>
                            <td><?php echo $coches['nombre'] ?></td>
                            <td><?php echo $coches['fecha_fabricacion'] ?></td>
                            <td><?php echo $coches['categoria'] ?></td>
                            <td><?php echo $coches['precio'] ?></td>
                            <td>
                                <?php if ($coches['comprar'] === FALSE): ?>
                                <form method="post" action="<?= $base_url ?>/coches/comprar/<?=$coches['id']?>">
                                    <button type="submit" class="btn btn-success">Adoptar</button>
                                </form>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Adoptado</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
        </table> 
        
        <h2 style="text-align:center;">Añadir Mascota</h2>
        <form method="post" action="<?= $base_url ?>/coches/add">
            <div style="max-width: 500px; margin: 0 auto;">
                <label class="form-label">Nombre:</label>
                <input type="text" name="nombre" class="form-control" required>
                <br>
                <label class="form-label">fecha_fabricacion:</label>
                <input type="text" name="fecha_fabricacion" class="form-control" required>
                <br>
                <label class="form-label">Categoría:</label>
                <input type="text" name="categoria" class="form-control" required>
                <br>
                <label class="form-label">Precio:</label>
                <input type="date" name="precio" class="form-control" required>
                <br>
                <button type="submit" class="btn btn-primary">Añadir Mascota</button>
            </div>
        </form>
        
        <!-- Debug info (opcional) -->
        <div style="margin-top: 20px; padding: 10px; background: #f8f9fa; text-align: center;">
            <small>Modo: <?php echo $backend_host === 'backend' ? 'PRODUCCIÓN' : 'DESARROLLO'; ?> | Backend: <?php echo $base_url; ?></small>
        </div>
    </body>
</html>