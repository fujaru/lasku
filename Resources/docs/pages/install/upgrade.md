# Upgrading from Previous Installation

If you have existing version of Lasku installed on your system, follow these 
steps to upgrade it to the newest version. Please note that this article 
only covers upgrading the Online Edition of Lasku. Upgrading Standalone 
Edition can be done by following the same procedure as first-time installation.

1. Download and unpack the newest Lasku zip package.
2. Upload Lasku files to your existing installation location on web server. 
   Your current files would be merged and existing files are replaced with the new ones.
3. Open **`/application/config/lasku.installer.php`** and find an option 
   named **'install-key'** like the following:
```
return array(
	'install-key' => "130ba8ff",
);
```
Take note on its value. We will use it later. On the above example, the 
value is `130ba8ff`.
3. Using your web browser, go to **`http://your-domain.com/path/to/lasku?key={install-key}`**. 
   Replace `{install-key}` with the key you've noted on previous step. 
   Without the key, the installer will only show "Under Maintenance" notice 
   to prevent unauthorized access to the installer.
5. Lasku installer will be displayed. Follow the instructions to begin 
   the upgrade process.

