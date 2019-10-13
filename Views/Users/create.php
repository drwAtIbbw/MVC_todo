<h1>Create user</h1>
<form method='post' action='#'>
    <div class="form-group">
        <label for="vorname">Benutzername</label>
        <input type="text" class="form-control" id="name" placeholder="name" name="name">
    </div>
    <div class="form-group">
        <label for="password">Passwort</label>
        <input type="password" class="form-control" id="password" placeholder="Passwort" name="password">
    </div>
	<div class="form-group">
        <label for="password2">Passwort wiederholen</label>
        <input type="password" class="form-control" id="password2" placeholder="Passwort" name="password2">
   </div>
<div class="form-group">
<label for="role">Rolle</label>	
<select class="custom-select form-control" name="role">
  
  <option selected value="admin">admin</option>
  <option value="schulleiter">Schulleiter</option>
  <option value="lehrer">Lehrer</option>
</select>	
</div>
    <button type="submit" class="btn btn-primary">Absenden</button>
</form>
