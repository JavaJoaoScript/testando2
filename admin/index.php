
<?php

session_start();

if (!isset($_SESSION["username"])) {
  header("Location: /painel");
  exit();
}



?>




<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.1/dist/js/bootstrap.bundle.min.js"></script>
    <link
      rel="shortcut icon"
      type="image/x-icon"
      href="./images/favicon-32x32.png"
    />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Painel de Controle Grann Automoveis</title>
  </head>
  <body class="light">
    <aside class="menu">
      <div class="menu-header">
        <h2>Grann Automoveis</h2>
      </div>
      <ul class="menu-list">
        <li class="menu-item">
          <a href="#" id="agendamentos-link">
            <i class="fas fa-calendar-alt"></i>
            Agendamentos
          </a>
        </li>
        <li class="menu-item">
          <a href="#" id="carros-link">
            <i class="fas fa-car"></i>
            Carros
          </a>
        </li>
        <li class="menu-item">
          <a href="#" id="motos-link">
            <i class="fas fa-motorcycle"></i>
            Motos
          </a>
        </li>

      </ul>
    </aside>
    <main class="content">
      <div class="container">
        <header>
          <div class="title">
  
          </div>
          <hr />
          <div class="toggleBtn">

            <input type="checkbox" id="toggle" class="visually-hidden"/>

          </div>
        </header>
        <div id="agendamentos-container" class="hidden">

            
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Data</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
        <div id="carros-container" class="hidden">
          <div id="motos-container" class="hidden">
           

          <button class="add-car-button">Adicionar Carro</button>

         

          </div>
          
      </div>

      
    </main>
    <script src="main.js"></script>
  </body>
</html>
