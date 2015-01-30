# Homeez Installation

Mapnik is web application run as web application.

Copy code to ROOT APACHE2 folder on your server.

First create new database with database manager account('ADMIN', 'PASSWORD') with name 'HOMEEZ'

Edit file app/config/database.php 

    'mysql' => array(
			'driver'    => 'mysql',
			'host'      => 'localhost',
			'database'  => 'HOMEEZ',
			'username'  => 'ADMIN',
			'password'  => 'PASSWORD',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		),

Back to root Folder and run composer

     php composer.phar install 
  
(Run with root user if needed)

    sudo php composer.phar install

Last, settup virutal host point to ROOT/public according [this blog] (https://www.digitalocean.com/community/tutorials/how-to-set-up-apache-virtual-hosts-on-ubuntu-14-04-lts)


 

  
