<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Filmdatenbank</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/starter-template/">

    

    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      
      .nav-item{
        cursor: pointer;
      }
      
      </style>

    
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
    <script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous">
    </script>
  </head>
  <body>
    
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand">Filmdatenbank</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item active">
          <a class="nav-link" onclick="changeC('a');" aria-current="page">Theatersuche</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" onclick="changeC('n');" aria-current="page">Theaterstück erfassen</a>
        </li>
      </ul>
      <!--<form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Suche" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Suche</button>
      </form>-->
    </div>
  </div>
</nav>

<main class="container">
  <div id="blockNew">
    <form id="editTheatherForm">
        <h3>Theaterstück erfassen</h3>
        <div class="form-group">
            <label for="dramaName">Titel des Stück:</label>
            <input name="dra_name" type="text" class="form-control" id="dramaName" placeholder="z.B. Faust">
        </div>
        <div class="form-group">
            <label for="dramaAutor">Autor</label>
            <select name="autor_id" class="form-control" id="dramaAutor">
            </select>
        </div>
        <div class="form-group">
            <label for="dramaGenre">Genre</label>
            <select name="gen_id" class="form-control" id="dramaGenre">
            </select>
        </div>
        <div class="form-group">
            <label for="dramaEvent">Erstaufführung am:</label>
            <input name="eve_termin" type="datetime-local" class="form-control" id="dramaEvent">
        </div>
        <br><button type="button" onclick="insertTheater();" class="btn btn-dark">speichern</button>
    </form>
    <div id="showTheater" style="display: none;">
    <h4>Filme</h4>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nr</th>
          <th scope="col">Genre</th>
          <th scope="col">Name des Stücks</th>
          <th scope="col">Autor</th>
          <th scope="col">Termine</th>
        </tr>
      </thead>
      <tbody id="content">
      </tbody>
    </table>
    <br><button type="button" onclick="backToCreate();" class="btn btn-dark">zurück zur Erfassung</button><br>
    </div>
    <div id="showError" style="display: none;">
      <br><h4>Fehler</h4>
      <p class="text-danger" id="errorMessage"></p>
    </div>
  </div>
</main><!-- /.container -->

    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script_new.js"></script>

  </body>
</html>
