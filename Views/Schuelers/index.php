<h1>Schüler</h1>
<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>
        <a href="/sqlite/schuelers/create/" class="btn btn-primary btn-xs pull-right"><b>+</b>Neuer Schüler</a>
        <tr>
            <th>ID</th>
            <th>Vorname</th>
            <th>Nachname</th>
		<th>Klasse</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <?php
	echo('<h1>'.$_SESSION['role'].'</h1>');
	 
        foreach ($schuelers as $schueler)
        {
            echo '<tr>';
            echo "<td>" . $schueler['id'] . "</td>";
            echo "<td>" . $schueler['vorname'] . "</td>";
            echo "<td>" . $schueler['nachname'] . "</td>";
		echo "<td>" . $schueler['classes_name'] . "</td>";
            echo "<td class='text-center'><a class='btn btn-info btn-xs' href='/sqlite/schuelers/edit/" . $schueler["id"] . "' ><span class='glyphicon glyphicon-edit'></span> Edit</a> <a href='/sqlite/schuelers/delete/" . $schueler["id"] . "' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Del</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>
