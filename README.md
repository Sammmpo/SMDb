SMDb - Sam's Movie Database

This project was created for PHP course in Laurea University of Applied Sciences.

What is SMDb and what features does it have?
- The idea of the application is to let people find movies by genre.
- Users are required to create an account on the website. With those accounts, they can also add movies to the database.
- The website is responsive to all mainstream screen sizes.
- Movies can have an embedded YouTube trailer.
- All official movie genres from IMDb (Internet Movie Database) are supported.
- Admin users can delete any movie from the database, while normal users can only delete their own. To become an admin, contact the server administrator.
- The website uses cookies to remember user-account login information.
- Passwords are encrypted with a non-decryptable method.
- Most of the SQL-queries, including all of which edit tables, are handled via Prepared Statements.

How to Setup:
- Download the .ZIP from this GitHub repository.
- Launch Apache and MySQL (with XAMPP for example).
- Go to phpMyAdmin, create a database "smdb" and import the .SQL script (it creates the tables and inserts default movies).
- Open "http://localhost:8080/SMDb/login.php" in your web browser (assuming "8080" is your Apache port number, which is "80" by default).
- Enjoy the App! :)
