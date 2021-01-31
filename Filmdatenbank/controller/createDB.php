<?php
include("../dbConnection.php");
// pdo
$pdo = returnPDO();
// sql 
$query = 'drop database if exists dbmovie';
$query1 = 'create database dbmovie';
$query2 = 'use dbmovie';
$query3 = 'create table tblpremiere (pre_id int primary key auto_increment, genre varchar(255), filmtitel varchar(255), jahr int, regie varchar(255))';
$insertMovie = 'insert into tblpremiere (genre, filmtitel, jahr, regie) 
                select gen_name as "Genre", 
              concat_ws(\' \', mov_title_1, mov_title_2) as "Filmtitel",
              date_format(mov_year, \'%Y\') as "Jahr", 
              concat_ws(\' \', per_fname, per_secName, per_lname) as "Regie" 
              from filmdatenbank.genre g natural join filmdatenbank.movie m natural join filmdatenbank.movie_director md natural join filmdatenbank.person p
              order by Genre, Filmtitel, Jahr';
$query4 = 'select Genre, Filmtitel, Jahr, Regie from tblpremiere order by Genre, Filmtitel, Jahr';
// output json
outputJSON($pdo, $query, [], true);
outputJSON($pdo, $query1, [], true);
outputJSON($pdo, $query2, [], true);
outputJSON($pdo, $query3, [], true);
outputJSON($pdo, $insertMovie, [], true);
outputJSON($pdo, $query4, []);
