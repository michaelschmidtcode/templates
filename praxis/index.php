<!doctype html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Praxis</title>

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
    <a class="navbar-brand">Praxis</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>

<main class="container">
  <div id="blockList">
    <div class="starter-template py-5 px-3">
    <h3>Patientendiagnose – Suche</h3><br>
    <form id="searchForm">
      <div class="form-group row">
        <label for="patients_id">Patienten</label>
        <select name="patients_id" class="form-control" id="patients_id">
        </select>
        <label for="visit">Zeitraum</label>
        <select name="visit" class="form-control" id="visit">
        </select>
        <button type="button" onclick="search()" class="btn btn-dark mt-2 col-2">Los</button>
      </div>
    </form>
    <hr>
    <table style="display:none" id="tableSearch" class="table">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Diagnosebereich</th>
          <th scope="col">Diagnose</th>
          <th scope="col">Datum</th>
        </tr>
      </thead>
      <tbody id="content">
      </tbody>
    </table>
    <div style="display:none;" id="noPatient">
      <p id="noPatientText"></p>
    </div>
</main><!-- /.container -->

    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>

  </body>
</html>
