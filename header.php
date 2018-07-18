<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>MS Office Educational Materials</title>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-dark bg-dark mb-4">
        <?php
          if ($_SERVER["PHP_SELF"] == "/admin.php"
                || $_SERVER["PHP_SELF"] == "/adminEdit.php"
                || $_SERVER["PHP_SELF"] == "/adminCreate.php") {
            echo '<a class="navbar-dark navbar-brand ml-5" href="admin.php">MS Office Educational Materials</a>';
            echo '<a class="navbar-dark navbar-brand mr-5" href="adminLogin.php">Logout</a>';
          } elseif ($_SERVER["PHP_SELF"] == "/adminLogin.php") {
            echo '<a class="navbar-dark navbar-brand ml-5" href="adminLogin.php">MS Office Educational Materials</a>';
            echo '<a class="navbar-dark navbar-brand mr-5" href="index.php">Home</a>';
          } else {
            echo '<a class="navbar-dark navbar-brand ml-5" href="index.php">MS Office Educational Materials</a>';
          }
        ?>
      </nav>
    </header>
    