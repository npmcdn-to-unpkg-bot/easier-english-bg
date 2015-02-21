<?php
/*
This is a sample local-config.php file
In it, you *must* include the four main database defines

You may include other settings here that you only want enabled on your local development checkouts
*/

define( 'DB_NAME', 'local_db_name' );
define( 'DB_USER', 'local_db_user' );
define( 'DB_PASSWORD', 'local_db_password' );
define( 'DB_HOST', 'localhost' ); // Probably 'localhost'

// ==============================================================
// Salts, for security
// Grab these from: https://api.wordpress.org/secret-key/1.1/salt
// ==============================================================
define('AUTH_KEY',         'yUN6gdM+qTMqci+&# xfU3WHa1m[8i-X{7@2(#wx@,MvBPp=hmUVZ+_>$}6QjqHm');
define('SECURE_AUTH_KEY',  '(&Po>`,##DQ|-ok)Kd*Y_,F;7M.SM7eKy+d7qDT|~$6Jz;nX%[>>qoa#(Fq3Jyc-');
define('LOGGED_IN_KEY',    'cU*0N;n^/TrJc /.t7^-%@HB7r,%9$dXi}|GK]Ej,^^XGoO^RsSYz=:#{WO2zU+R');
define('NONCE_KEY',        'L1ECU&YZ%<-SCp`|D?[xx)jfq$Cq3w!|-P1Gjf>L@2#S+UzN54YmYh~jaq*|v~jC');
define('AUTH_SALT',        '=<:9,f2E@,@]_+`eJ:l9kHAs|4|0rfd-Hj WYY)boLcPE|>3-E$cwZOg*}N{E6RJ');
define('SECURE_AUTH_SALT', '!9Y1WHILYI`hArw~P/|h#  vK4Iix[V;~I!u`X0Zct|5kj]UV>E{{u-0=p);t,gl');
define('LOGGED_IN_SALT',   '|{u+Co1S(}Q@)j*K`|eCTroC[E0>~aIK=I>M-7>Mj8+;vK/PCRu s==][E|yJ !B');
define('NONCE_SALT',       '16TsnTUgDQs0h^X7r-30%~4I|hmb*U.z[=Mjya:u_QnRqfvrG.vqCR@H41as@CEj');