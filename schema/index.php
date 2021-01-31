<!doctype html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Datenbank Struktur</title>

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
    <a class="navbar-brand">Datenbankstruktur</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>

<main class="container">
  <div id="blockList">
    <div class="starter-template py-5 px-3">
    <h3>Datenbank auflisten</h3><br>
    <div id="schemaContainer">
    </div>
    <div id="tableContainer" style="display: none;">
      <h4 id="databaseName"></h4><br>
      <div id="tableContainerElements">
        <h4>Tabellen</h4>
        <div id="tableContainerElementsItems"></div>
      </div>
      <div id="structureContainerElements" style="display: none;">
        <h4>Tabelle: <span id="tableName"></span></h4>
        <div id="structureContainerElementsItems"></div>
      </div>
    </div>
    <br><button type="button" id="clearButton" class="btn btn-primary">Zur Übersicht</button>
</main><!-- /.container -->

    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
  </body>
</html>
