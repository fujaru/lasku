# Installation

Installing Lasku Invoicing System is easy. This article will describe step
by step installation. You might want to read system [requirements](about/requirements) 
first before starting the installation.

- - -

## Online Edition

The online edition requires a web server to host Lasku. Here we cover 
installation on Apache-based web server. Installation on IIS or other 
web server might need slight adjustments.

1. Download and unpack Lasku zip package.
2. Upload Lasku files to a public directory on your web server.
3. Create an empty MySQL database on the server. Also, prepare a database 
   user to access it.
4. Open the location where you put the files using a web browser, for 
   example `http://your-domain.com/path/to/lasku`.
5. Lasku installer will be displayed. Follow the instructions to begin 
   installation.

Once the installation finishes, you can login to Lasku using the default 
administrator user:
```
Username: admin@your-domain.com
Password: admin
```

Do not forget to change the default password once you are logged in.

If after installation you are seeing "Under Maintenance" message, this is 
because the installer was unable to automatically disable the installer 
script by removing **`/install.php`** file. You can disable it manually 
by locating your installation directory, and remove/rename the file **`/install.php`**.
When `/install.php` does not exists, Lasku will work normally.

### Removing index.php

This step is optional but can make URLs looking prettier. It will change 
URLs which look like this:  
`http://your-domain.com/path/to/lasku/index.php/invoice`  
into this:  
`http://your-domain.com/path/to/lasku/invoice`

To do this, it requires Apache web server with **mod_rewrite** module enabled, plus 
directory level configuration a.k.a. **.htaccess** enabled.

During installation process, you will be presented with a page allowing 
you to input basic configurations. There is an option labeled as **"Index File"** 
with the default value `index.php`. Set the value to **blank** and 
you're all set.

If you already have an existing installation of Lasku, the Index File 
configuration option can be set manually by editing **`/application/config/bootstrap.init.php`** 
file. Fine an option named **'index_file'** like the following:
```
	'index_file' => 'index.php',
```
Change its value to **`''`** (empty text), become:
```
	'index_file' => '',
```


### Re-running the Installer

Once the installation finishes, the installer will be disabled. To rerun 
the installer, follow the steps:

1. Rename **`/install.bak.php`** back to **`/install.php`**.
2. Open **`/application/config/lasku.installer.php`** and find an option 
   named **'install-key'** like the following:
```
	'install-key' => "130ba8ff",
```
Take note on its value. We will use it later. On the above example, the 
value is `130ba8ff`.
3. Using your web browser, go to **`http://your-domain.com/path/to/lasku?key={install-key}`**. 
Replace `{install-key}` with the key you've noted on previous step. 
Without the key, the installer will only show "Under Maintenance" notice 
to prevent unauthorized access to the installer.

**Note:** Should you want to sweep everything and perform complete 
reinstallation, you can *empty the database* and remove all files under **`/application/config`** 
directory before running the installer again. `{install-key}` will not 
be required to do this. However, please proceed with caution.

- - - 

## Standalone Edition

The standalone edition of Lasku is planned for future development and not 
yet implemented at the moment.

### Windows

### Linux

### Mac OS X
