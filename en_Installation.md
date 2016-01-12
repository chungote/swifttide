### System Requirements ###

Basically, any operating system with Apache, MySQL and PHP will do.

At least MySQL 4.1 and PHP 4.  Earlier versions will cause problems.

For testing purposes on the local machine, you may try [XAMPP](http://www.apachefriends.org/en/xampp.html), you get Apache/MySQL/PHP already done for you.

You MUST ensure that PHP has been compiled with support for MySQL and Zlib
in order to successfully run SMS.

We recommend Apache for running SMS on Windows.

### Installing Swifttide ###

#### For Windows Platform ####

The school management system (SMS) comes with  an automated installation.

The following tutorial assumes that you are installing a php software for the first time at Windows platform for testing purposes.

  * Download [htpp://www.apachefriends.org/en/xampp.html XAMPP], if you haven't already.
  * Install XAMPP to `C:\xampp` folder.
  * Start Apache and MySQL servers. For more information about installing XAMPP and starting Apache and MySQL server, please refer to [XAMPP Documentations](http://www.apachefriends.org/en/xampp.html).
  * Download the latest version of Swifttide from the [download section](http://code.google.com/p/swifttide/downloads/list).
    * Extract the files to the webrrot directory. (If you have been following so far, the default should be `C:\xampp\htdocs`).
    * Create the database for Swifttide. (Please see `2. CREATE THE SMS DATABASE` later in this section).
    * Now point your browser to http://127.0.0.1/swifttide.
    * The page presented should guide you for the rest.

#### For Linux Platform ####

> You can obtain the latest SMS release from:
> http://code.google.com/p/swifttide/downloads/list

> Extract the compressed file to your web root folder. If you are on windows

> Copy the tar.gz file into a working directory e.g.

> `$ cp command_school-104.tar.gz /tmp/sms`

> Change to the working directory e.g.

> `$ cd /tmp/sms`

> Extract the files e.g.

> `$ tar -zxvf command__school-104.tar.gz`

> This will extract all SMS files and directories. Move the contents
> of that directory into a directory within your web server's document
> root or your public HTML directory e.g.

> `$ mv /tmp/sms/* /var/www/html`

> Alternatively if you downloaded the file to your computer and unpacked
> it locally use a FTP program to upload all files to your server.
> Make sure all PHP, CSS and JS files are sent in ASCII mode and
> image files (GIF, JPG, PNG) in BINARY mode.

## 2. CREATE THE SMS DATABASE ##

> SMS will currently only work with MySQL. In the following examples,
> "db\_user" is an example MySQL user which has the CREATE and GRANT
> privileges. You will need to use the appropriate user name for your
> system.

> First, you must create a new database for your SMS site e.g.

> `$ mysqladmin -u db_user -p create sms`

> MySQL will prompt for the 'db\_user' database password and then create
> the initial database files.  Next you must login and set the access
> database rights e.g.

> `$ mysql -u db_user -p`

> Again, you will be asked for the 'db\_user' database password.  At the
> MySQL prompt, enter following command:

> `GRANT ALL PRIVILEGES ON sms.*`
> `        TO nobody@localhost IDENTIFIED BY 'password';`

> where:

> 'sms' is the name of your database
> 'nobody@localhost' is the userid of your webserver MySQL account
> 'password' is the password required to log in as the MySQL user

> If successful, MySQL will reply with

> `Query OK, 0 rows affected`

> to activate the new permissions you must enter the command

> `flush privileges;`

> and then enter `'\q'` to exit MySQL.

> Alternatively you can use your web control panel or phpMyAdmin to
> create a database for SMS.

## 3. WEB INSTALLER ##

> Finally point your web browser to http://localhost/installation where
> you can start the SMS web based installer for the rest of the installation.

> Note: Change 'localhost' with the correct location you have chosen
> to copy the SMS files to.