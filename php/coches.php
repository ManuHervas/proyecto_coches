
<?php 
    include_once 'functions.php';
    start_session();
      
      $brand = $_GET['brand'];
        
     $modelos = [];

     switch ($brand) {
        case 'Ferrari':
            $modelos=[
                "Ferrari 812 Competizione" => "https://cdn.ferrari.com/cms/network/media/img/resize/64e364ec15bfaa0011123cc2-ferrari-tailor-made-812-competizione-landscape",
                "Ferrari F8 Tributo" => "https://upload.wikimedia.org/wikipedia/commons/thumb/8/8b/Ferrari_F8_Tributo_Genf_2019_1Y7A5665.jpg/1200px-Ferrari_F8_Tributo_Genf_2019_1Y7A5665.jpg", 
                "Ferrari SF90 Stradale" => "https://cdn.motor1.com/images/mgl/B7Aow/s1/novitec-ferrari-sf90-stradale.jpg"
            ];
            break;

        case 'Lamborghini':
            $modelos=[
                "Lamborghini Huracán Performante" => "https://hips.hearstapps.com/es.h-cdn.co/cades/contenidos/11133/lamborghini-huracan_performante_spyder-2019-1600-02.jpg", 
                "Lamborghini Aventador" => "https://www.diariomotor.com/imagenes/2021/07/lamborghini-aventador-blanco-769098.jpg", 
                "Lamborghini Sián" => "https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/model/sian_rds_refresh_2023/s2.jpg"
            ];
            break;

        case 'Jeep':
            $modelos=[
                "Jeep Grand Cherokee" => "https://cdn.drivek.com/configurator-imgs/cars/es/Original/JEEP/GRAND-CHEROKEE-4XE/41150_SUV-5-DOORS/jeep-grand-cherokee-22-front-view.jpg",
                "Jeep Wrangler" => "https://aventura.espirituracer.com/archivos/2017/11/Jeep-Wrangler-Willys-4xe-2023-11-e1663579868190.webp", 
                "Jeep Gladiator" => "https://cdn.autobild.es/sites/navi.axelspringer.es/public/bdc/dc/fotos/Jeep_Gladiator_01_0.jpg?tf=1200x"
            ];
            break;
        default:
            # code...
            break;
     }
     
     if (!isset($_SESSION['models'])) {
        $_SESSION['models'] = [];
    }
    
    if (isset($_POST['model'])) {
        $modelo = $_POST['model'];
    
        $_SESSION['models'][] = $modelo;
    }

    if (isset($_POST['volver_atras'])) {
        
        header('Location: ../html/index.html');
        exit(); 
    }
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modelos de <?php echo $brand ?></title>
     
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 60%;
            margin: 50px auto;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .car-list {
            list-style: none;
            padding: 0;
        }

        .car-list li {
            display: flex;
            align-items: center;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #e3e3e3;
            border-radius: 5px;
        }

        .car-list img {
            width: 125px;
            /* Ancho fijo */
            height: 100px;
            /* Altura fija */
            object-fit: cover;
            /* Mantiene la relación de aspecto y recorta la imagen */
            margin-right: 15px;
            border-radius: 5px;
        }

        .buy-button {
            margin-left: auto;
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .buy-button:hover {
            background-color: #0056b3;
        }

         /* Estilo del carrito en la parte superior derecha */
         .cart-icon {
            position: fixed;
            top: 20px;
            right: 20px;
            font-size: 24px;
            color: #333;
        }

        .cart-icon:hover {
            color: #007BFF;
        }

        .logout-button {
            padding: 12px 25px;
            font-size: 18px;
            color: white;
            background-color: #ff6b6b;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .logout-button:hover {
            background-color: #ff4949;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.25);
        }

        .logout-button:focus {
            outline: none;
            box-shadow: 0 0 0 4px rgba(255, 107, 107, 0.5);
        }
        .back-button {
            padding: 12px 25px;
            font-size: 18px;
            color: white;
            background-color: #4CAF50; /* Verde agradable */
            border: none;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .back-button:hover {
            background-color: #45a049;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.25);
        }

        .back-button:focus {
            outline: none;
            box-shadow: 0 0 0 4px rgba(76, 175, 80, 0.5);
        }
    </style>
</head>

<body>
    <div class="container">
    <form action="" method="POST">
        <button type="submit" name="volver_atras" class="back-button">Volver Atrás</button>
    </form>
        <form action="POST"></form>
        <h1>Modelos de <?php echo $brand ?></h1>
        <ul class="car-list">
            <?php
            foreach ($modelos as $key => $value) {
                echo '<li>
                <img src="'.$value.'"
                    alt="'.$key.'">
                <span>'.$key.'</span>'?>
                <form action="" method="POST" style="margin-left: 52%; position: absolute;">
                    <button type="submit" name="model" id="model" value="<?php echo $key ?>" class="buy-button">Comprar</button>
                </form>                
                
                 <?php echo '
            </li>';
            }
                
            ?>

        <h2>Carrito de la compra</h2>
            <ul class="car-list">
                <?php
                if (!empty($_SESSION['models'])) {
                    foreach ($_SESSION['models'] as $modeloComprado) {
                        echo '<li>' . $modeloComprado . '</li>';
                    }
                } else {
                    echo '<p>No has añadido ningún modelo al carrito.</p>';
                }
                ?>
            </ul>
            
        </ul>

        <form action="logout.php" method="POST">
        <button type="submit" class="logout-button">Cerrar Sesión</button>
    </form>

    </div>
</body>

</html>