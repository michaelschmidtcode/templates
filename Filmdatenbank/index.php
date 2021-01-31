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
          <a class="nav-link" onclick="changeC('a');" aria-current="page">Aktuelle Filmliste</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" onclick="changeC('e');" aria-current="page">Erfassten Film ändern</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" onclick="changeC('c');" aria-current="page">Datenbank erstellen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" onclick="changeC('n');" aria-current="page">Film erfassen</a>
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
  <div id="blockList"> 
    <div class="starter-template py-5 px-3">
    <h2>Suche nach Filmen in einem bestimmten Zeitraum</h2><br>
    <form>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Suche:</label>
        <div class="col-sm-2">
          <input type="date" class="form-control" id="dateInputStart" value="">
        </div>
        <div class="col-sm-2">
          <input type="date" class="form-control" id="dateInputEnd" value="">
        </div>
        <div class="col-sm-2">
          <button type="button" onclick="search()" class="btn btn-dark">Los</button>
        </div>
      </div>
    </form>
    <hr>
    <br><h3>Filme</h3><br>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Genre</th>
          <th scope="col">Filmname</th>
          <th scope="col">Jahr</th>
          <th scope="col">Regisseur</th>
        </tr>
      </thead>
      <tbody id="content">
      </tbody>
    </table>
    </div>
  </div>
</main><!-- /.container -->

    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>

  </body>
</html>
