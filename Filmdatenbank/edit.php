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
  <div id="blockEditSelect">
    <form>
        <div class="form-group">
        <label for="exampleFormControlSelect1">Filme</label>
        <select class="form-control" id="movieSelect">
        </select>
        </div>
        <br><button type="button" onclick="selectMovie();" class="btn btn-dark">Auswählen</button>
    </form>
  </div>
  <div id="blockEdit" style="display:none">
    <form id="editMovieForm">
        <div class="form-group">
            <label for="movie_title">Filmtitel:</label>
            <input name="mov_title_1" type="text" class="form-control" id="movie_title">
        </div>
        <div class="form-group">
            <label for="movie_title_2">Verleihtitel:</label>
            <input name="mov_title_2" type="text" class="form-control" id="movie_title_2">
        </div>
        <div class="form-group">
            <label for="movie_year">Erscheinungsjahr:</label>
            <input name="mov_year" type="date" class="form-control" id="movie_year">
        </div>
        <div class="form-group">
            <label for="movie_genre">Genre</label>
            <select name="GENRE_gen_id" class="form-control" id="movie_genre">
            </select>
        </div>
        <br><button type="button" onclick="saveChanges();" class="btn btn-dark">Änderung speichern</button>
    </form>
    <div id="editMovieChange" style="display: none;">
    <h4>Änderung durchgeführt</h4>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Genre</th>
          <th scope="col">Filmtitel</th>
          <th scope="col">Verleihtitel</th>
          <th scope="col">Erscheinungsjahr</th>
        </tr>
      </thead>
      <tbody id="content">
      </tbody>
    </table>
    <br><button type="button" onclick="backToSelect();" class="btn btn-dark">zurück zur Auswahl</button>
    </div>
  </div>
</main><!-- /.container -->

    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script_edit.js"></script>

  </body>
</html>
