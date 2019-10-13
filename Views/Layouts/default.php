<!doctype html>
<head>
    <meta charset="utf-8">

    <title>sqlite</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" rel="stylesheet">

    <link href="starter-template.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <style>
        body {
            padding-top: 5rem;
        }
        .starter-template {
            padding: 3rem 1.5rem;
            text-align: center;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="<?= WEBROOT ?>users">SQLITE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= WEBROOT ?>users">Home<span class="sr-only">(current)</span></a>
		
            </li>
		<li class="nav-item">
                <a class="nav-link" href="<?= WEBROOT ?>schuelers">Schüler</a>
		
            </li>
        	</li>
		<li class="nav-item">
                <a class="nav-link" href="<?= WEBROOT ?>users/logout">Logout</a>
		
            </li>
            
        </ul>
	<form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    </div>
</nav>

<main role="main" class="container">

    <div class="starter-template">

        <?php
	
        echo $content_for_layout;
        ?>

    </div>

</main>


</body>
</html>
