<h1>Edit user</h1>
<form method='post' action='#'>
    <div class="form-group">
        <label for="vorname">Vorname</label>
        <input type="text" class="form-control" id="vorname" placeholder="Vornamen" name="vorname" value ="<?php if (isset($user["vorname"])) echo $user["vorname"];?>">
    </div>

    <div class="form-group">
        <label for="nachname">Nachname</label>
        <input type="text" class="form-control" id="nachame" placeholder="Nachnamen" name="nachname" value ="<?php if (isset($user["nachname"])) echo $user["nachname"];?>">
    </div>
<div class="form-group">
        <label for="classes_name">Klasse</label>
        <input type="text" class="form-control" id="classes_name" placeholder="Klasse" name="classes_name" value ="<?php if (isset($user["classes_name"])) echo $user["classes_name"];?>">
    </div>
    <button type="submit" class="btn btn-primary">Absenden</button>
</form>
