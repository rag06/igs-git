<?php 
if( function_exists('opcache_reset') ) echo 'yay!';
echo"hi";
echo phpinfo(); 
opcache_reset();

?>