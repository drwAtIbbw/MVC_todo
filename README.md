# MVC todo

Code explained in this article blog : https://medium.com/@noufel.gouirhate/create-your-own-mvc-framework-in-php-af7bd1f0ca19

Great idea extended to include authentication and authorization (see below)
Users Table contains app users with roles with adjustable rights.
Schuelers Table serves as an example table for the app.
Authorization is not really implemented (crude in-code example for demo purposes only: role lehrer sees only schueler in classes_name 2)

The tasks table and model cannot be used with the existing sqlite database, but can be of course created with sqlite3 command and adjusted according to schuelersController and schuelersModel.
Admin access of the demo database: Benutzername: batman Passwort: gotham
