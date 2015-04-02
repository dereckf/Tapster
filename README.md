#Tapster v0.1

###Alex Brewer

This is a web interface for the OpenBeerDatabase API.

##Step-by-step run instructions:

###Restart your apache server (not necessary, but I just like to do it).

`/etc/init.d/apache2 restart`

###Clone repo into the root of your web directory (something like /var/www/html/)

`git clone git://github.com/ATheringer/Tapster/`

###Open the landing page tapster.html (using your preferred browser - I use firefox)

`firefox tapster.html` 

##To import the local database into MySQL:

`mysql -u username -ppassword database_name < tap_dump.sql`
(checklogin.php and checkreg.php assume that you are the root user and that there is no password set)


That's it! It should make simple queries now - more functionality (such as a login) will be added later. Let me know if there are any issues.
