<h1>Benutzer</h1>
<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>
        <a href="<?= WEBROOT ?>users/create/" class="btn btn-primary btn-xs pull-right"><b>+</b>Neuer Benutzer</a>
        <tr>
            <th>ID</th>
            <th>Benutzername</th>
            <th>Rolle</th>
		
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <?php
	echo('<h1>'.$_SESSION['role'].'</h1>');
	 
        foreach ($users as $user)
        {
            echo '<tr>';
            echo "<td>" . $user['id'] . "</td>";
            echo "<td>" . $user['name'] . "</td>";
            echo "<td>" . $user['role'] . "</td>";
		
            echo "<td class='text-center'><a class='btn btn-info btn-xs' href='<?= WEBROOT ?>users/edit/" . $user["id"] . "' ><span class='glyphicon glyphicon-edit'></span> Edit</a> <a href='<?= WEBROOT ?>users/delete/" . $user["id"] . "' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Del</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>
