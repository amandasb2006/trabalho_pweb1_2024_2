<?php

function head()
{

  echo '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Horizontes</title>
                <!-- Bootstrap CSS -->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            </head>
            <body>
            <div class="container">
             <div class="row">
            ';

  menu();
}

function footer()
{
  echo '
                </div>
              </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            </body>
        </html>';
}


function menu() {

    $base_url = (basename(getcwd()) != 'paginas') ? 'paginas/' : '.';

    echo "<nav class='navbar navbar-expand-lg bg-body-tertiary'>
    <div class='container-fluid'>
      <a class='navbar-brand' href='../../index.php'>Agencias de Viagens</a>
      <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
      </button>
      <div class='collapse navbar-collapse justify-content-center' id='navbarSupportedContent'>
        <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
          <li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='../../index.php'>Home</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='$base_url/pacoteList.php'>Pacotes De Viagem</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='$base_url/servicosList.php'>Serviços</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='$base_url/destinosList.php'>Destinos</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='$base_url/usuariosList.php'>Usuários</a>
          </li>
         </ul>
      </div>
    </div>
  </nav>";
}
?>