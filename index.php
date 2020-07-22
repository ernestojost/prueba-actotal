<?php require_once 'includes/connection.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Prueba ACTotal</title>
        <link rel='icon' type='image/x-icon' href='assets/img/favicon.png' />

        <!-- Bootstrap -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />

        <!-- My styles -->
        <link rel="stylesheet" type="text/css" href="./assets/css/styles.css" />
    </head>
    <body>

        <!-- Logo -->
        <img class="mx-auto d-block p-5" src="assets/img/actotal-logo.png"/>

        <!-- Contenido principal -->
        <div id="main-content" class="d-flex h-auto justify-content-center mb-2 pb-2">
            <div id="data-entry" class="w-50">
                <h2 class="text-center">Ingreso de Datos</h2>
                <form class="mx-auto mt-5 d-block" action="includes/add-user.php" method="POST">
                    <div class="d-flex form-group justify-content-between">
                        <label class="my-auto" for="name">Nombre</label>
                        <input id="form-name" name="name" type="text" class="form-control border-0 rounded-0 text-body p-1" required>
                    </div>
                    <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'name') : ''; ?>
                    <div class="d-flex form-group justify-content-between mt-4">
                        <label class="my-auto" for="email">Email</label>
                        <input type="email" id="form-email" name="email" class="form-control border-0 rounded-0 text-body p-1" required>
                    </div>
                    <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'email') : ''; ?>
                    <div class="d-flex form-group justify-content-between mt-4">
                        <label class="my-auto" for="phone">Teléfono</label>
                        <input type="tel" id="form-phone" name="phone" class="form-control border-0 rounded-0 text-body p-1" required>
                    </div>
                    <?php
                    echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'phone') : '';
                    if (isset($_SESSION['complete'])):
                        ?>
                        <div class="alert alert-success">
                            <?= $_SESSION['complete'] ?>
                        </div>
                    <?php endif; ?>
                    <button id="form-submit" type="submit" class="btn btn-primary mt-4 px-2 py-1 text-body float-right">Guardar</button>
                </form>
                <?php deleteError(); ?>
            </div>

            <!-- Linea separatoria -->
            <div id="line" class="mt-4"></div>

            <div id="data-listing" class="w-50">
                <h2 class="text-center">Listado de Datos</h2>
                <div id="list-content" class="mx-auto mt-4 d-block overflow-auto">

                    <?php
                    $users = getUsers($db);
                    // Si hay al menos un producto
                    if (!empty($users)):
                        while ($user = mysqli_fetch_assoc($users)):
                            ?>

                            <div class="list-item px-3 py-1 mt-1 d-flex">
                                <div class="left-content-item overflow-hidden">
                                    <div class="d-flex line-height-12">
                                        <p class="mr-1 my-auto font-weight-bold sky-blue-color">Nombre:</p>
                                        <p class="my-1 text-nowrap"><?= $user['nombre'] ?></p>
                                    </div>
                                    <div class="d-flex line-height-12">
                                        <p class="mr-1 my-auto font-weight-bold sky-blue-color">Teléfono:</p>
                                        <p class="mb-1 mt-2 text-nowrap"><?= $user['telefono'] ?></p>
                                    </div>
                                </div>
                                <div class="right-content-item ml-3 overflow-hidden">
                                    <div class="d-flex line-height-12">
                                        <p class="mr-1 my-auto font-weight-bold sky-blue-color">Email:</p>
                                        <p class="my-1 text-nowrap"><?= $user['email'] ?></p>
                                    </div>
                                    <div class="d-flex line-height-12">
                                        <p class="mr-1 my-auto font-weight-bold sky-blue-color">Ingresado:</p>
                                        <p class="mb-1 mt-2 text-nowrap"><?= $user['fecha'] ?></p>
                                    </div>
                                </div>
                            </div>

                            <?php
                        endwhile;
                    else:
                        ?>
                        <p class="text-center">No hay ningún usuario</p>
                    <?php
                    endif;
                    ?>

                </div>
            </div>
        </div>



        <!-- Bootstrap -->
        <script type="text/javascript" src="jquery/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>

