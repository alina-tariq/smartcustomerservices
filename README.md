<h1 align="center">Smart Customer Services [CPS630 Project]</h1>

<p align="center">
  <img src="https://alinacodes.vercel.app/static/media/scs.a9b4b9c670d20090b5db.png" height="200">
</p>

## Description
Smart Customer Services (SCS) is an online system that aims to plan for smart green trips inside the city and its neighborhood for online shopping
and then delivery to the destinations. Our group chose the sale and at-home delivery of groceries as our department, and we built our website using AngularJS, PHP, and HTML/CSS/JS.

## Demo
In order of run this application, you must:
* download and install [XAMPP](https://www.apachefriends.org/download.html) 
* unzip the project files into the XAMPP > htdocs folder
* start XAMPP and ensure the Apache and MySQL servers are running
* in a web browser open up [http://localhost/phpmyadmin/index.php](http://localhost/phpmyadmin/index.php)
* create a new database with name "scs" of collation type 'utf8mb4_general_ci'
* navigate to [http://localhost/CPS630Project/mainpage.php](http://localhost/CPS630Project/mainpage.php)

## Notes
* all the SQL tables have pre-inserted queries are inserted except for Reviews and Orders
* there are three type of accounts: Admin (0), Standard (1), and Premium (2)
  - admin accounts have special admin privileges that allow them to insert, update, search, select, and delete records in the database
  - standard accounts can place orders, write reviews, and upgrade to a premium account
  - premium accounts have all the same privileges as standard accounts but have discounted prices on items
  - an admin account can only be created by another admin using the Database Maintain menu to insert a new user with account type 0 (admin)
* to login as an admin member, use the following login information:
  - username: kieran
  - password: pass123
* to login as a standard account member, use the following login information:
  - username: carlobeck
  - password: pass123
* to login as a premium account member, use the following login information:
  - username: mtate
  - password pass123
