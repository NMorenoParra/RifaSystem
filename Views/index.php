<?php
  include "../Models/model.php";
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rifa | Profondos Martín</title>
    <meta name="description" content="Arma la gestion de tu rifa" />
    <link
      rel="shortcut icon"
      href="../Views/lotto-lottery-raffle-svgrepo-com.svg"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="../Views/estilos.css" />
    <script
      src="https://kit.fontawesome.com/6b1b3207e8.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  </head>
  <body>
    <header>
      <div class="logo">
        <img src="../Views/baby-svgrepo-com.svg" alt="Logo Baby" />
        <h2>Rifa Martín</h2>
      </div>
      <nav>
        <ul>
          <li id="item-inicio" onclick="mostrarSeccion('inicio')">
            <i class="fas fa-home"></i> Inicio
          </li>
          <li id="item-registro" onclick="mostrarSeccion('registro')">
            <i class="fa-solid fa-user-plus"></i> Registrar
          </li>
          <li id="item-lista" onclick="mostrarSeccion('lista')">
            <i class="fa-solid fa-list"></i> Lista
          </li>
          <li id="item-dinero" onclick="mostrarSeccion('dinero')">
            <i class="fa-solid fa-wallet"></i> Dinero
          </li>
        </ul>
      </nav>
    </header>
    <main>
      <!-- Inicio -->
      <section id="inicio" class="flex section">
        <h2>¡Números Disponibles!</h2>
        <div class="numbers">
          <?php
          $instancia = new Persona();
          $respuesta = $instancia->consultaNumeros(); foreach($respuesta as
          $valor){ ?>
          <span class="span">
            <?php
              if($valor['Estado']=="Disponible"){
                echo $valor['Numero'];
              }else{
            ?>
            <span class="disabled"></span>
            <?php
              }
             ?>
          </span>
          <?php
          }
        ?>
        </div>
      </section>
      <!-- Formualario Registro -->
      <section id="registro" class="section hidden">
        <form
          action="../Controllers/controller.php"
          method="post"
          class="register-form"
          onsubmit="return false"
          autocomplete="off"
        >
          <h3>Registro de Persona <i class="fas fa-user-plus"></i></h3>
          <button class="btn-reset" type="reset" title="Resetear">
            <i class="fa-solid fa-arrows-rotate"></i>
          </button>
          <div>
            <label for="nombre">Nombre:</label>
            <input
              type="text"
              placeholder="Digita el nombre completo"
              id="nombre"
              name="nombre"
            />
          </div>
          <div>
            <label for="numero">Numero:</label>
            <select name="numero" id="numero">
              <option value="">Seleccione un número</option>
              <?php 
            foreach($respuesta as $valor){
              if($valor['Estado']=='Disponible'){
            ?>
              <option value="<?php echo $valor['Numero']?>">
                <?php echo $valor['Numero']?>
              </option>
              <?php
              }
            } 
            ?>
            </select>
          </div>
          <div>
            <label for="estado">Estado de Pago:</label>
            <select name="estado" id="estado">
              <option value="" selected>Seleccione una opcion</option>
              <option value="1">Pagado</option>
              <option value="2">Debe</option>
            </select>
          </div>
          <button class="btn-registrar" onclick="validationForm()">
            Registrar
          </button>
          <p class="aviso" id="aviso"></p>
        </form>
      </section>
      <!-- Lista de personas -->
      <section id="lista" class="section hidden">
        <div class="tabla">
          <table class="person">
            <thead>
              <tr>
                <th>Número</th>
                <th>Nombre</th>
                <th>Estado de Pago</th>
                <th>Editar Estado</th>
              </tr>
            </thead>
            <tbody>
              <?php
            $instancia2 = new Persona();
            $personas = $instancia2->consultPerson(); foreach($personas as
              $persona){ ?>
              <tr>
                <td><?php echo $persona['Numero']?></td>
                <td><?php echo $persona['Nombre']?></td>
                <?php if($persona['EstadoPago']=='Pagado'){ ?>
                <td style="color: green; font-weight: 600">
                  <?php echo $persona['EstadoPago']?>
                </td>
                <td>-</td>
                <?php }else if($persona['EstadoPago']=='Debe'){ ?>
                <td style="color: red; font-weight: 600">
                  <?php echo $persona['EstadoPago']?>
                </td>
                <td>
                  <a
                    href="../Controllers/controller2.php?numero=<?php echo $persona['NumeroPersona']; ?>"
                    style="color: #f7d26c"
                    class="link"
                    ><i class="fas fa-pen"></i
                  ></a>
                </td>
                <?php }else{ ?>
                <td></td>
                <td></td>
                <?php } ?>
              </tr>
              <?php
            }
            ?>
            </tbody>
          </table>
        </div>
      </section>
      <section id="dinero" class="section hidden">
        <?php
        $instancia4 = new Persona();
        $monto = $instancia4->consultaMonto(); 
        ?>
        <div class="container-monto">
          <img
            src="../Views/cash-financial-money-wallet-svgrepo-com.svg"
            alt="Imagen de Billetera"
          />
          <p>El Monto Total reúnido es:  $
            <span id="valor" data-number="<?php echo $monto[0]['MontoTotal'] ?>">
              <?php echo $monto[0]['MontoTotal'] ?>
            </span>
          </p>
        </div>

      </section>
    </main>
    <?php
    if(isset($script)){
    ?>
    <script>
      <?php
      echo $script;
      ?>
    </script>
    <?php
    }
    ?>
    <script src="./codigo.js"></script>
  </body>
</html>
