Lasku Invoicing System
=======================

Web-based invoicing system for freelancers and small businesses, inspired by FusionInvoice.

The goal of Lasku is to provide a simple, easy to install, easy to use, and powerful invoicing system for small businesses. Although it's inspired by FusionInvoice (it's a great invoicing system, you should check it out!), this project is built from ground up using Kohana and TideSDK frameworks.


Notice
-------
This project is still under development and not ready for production use. You may encounter bugs, missing features, and funky funky stuffs.


Features (Goals to be precise)
-------------------------------
- Easy installation/upgrade
- Can be installed on web server or as a standalone application
- Supports Windows, Linux, Mac OS X
- Multiple currency
- Invoice templates
- Export to PDF
- Guest URL to view invoice online
- Branding
- Reporting
- Sending invoices via email
- API
- Plugin system
- Item lookups
- Multiple users
- PayPal integration
- Multi-language
- Themeable


System Requirements
--------------------
- PHP 5.3.3 or newer
- MySQL 4.1.3 or newer


Installation
-------------
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

For more information on installation, please refer to Lasku Documentation 
at **`/docs`** using your web browser.


Documentation
--------------
Lasku Documentation is available at **`/docs`**. No installation is necessary 
to open the documentation.
