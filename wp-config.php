<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'wp_mmb');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'root');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '^Ggqi8lLVd9-CYAU<$<Mz?xvaQ}M5*#d/Xw^r#LfEztjJ+1uR.l<)!-YS{Z[~/<P'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_KEY', 'y-8b3NbmuR^C-bYe3DK+n]41|ZrZc(x 1|*c}eTIEgL$/0a-4Xc-#u.L]nLWN-bn'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_KEY', 'Gbt^2x-w{C|U]L}i(XX/{TF1}j+?oP- xps-.+hG s?E_8dz./|-G,Mp|TA6ZG63'); // Cambia esto por tu frase aleatoria.
define('NONCE_KEY', 'Mf*}/?[XoXF[T>/]$*= >+DQv}n!B(9JX6mo+%OY)I-VPYP@gkovtOI_GZws.u@]'); // Cambia esto por tu frase aleatoria.
define('AUTH_SALT', 'ESgE[_#6`8-o~?}?Z 3@8uKh D=Fp1%9h[RK|4IU5|w1L,COTz&]UyYT_P== z[K'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_SALT', ')KX2U_mAid|&( hQ:*Y4mK5#hmUyuFnR!&D9+4np}2xN<6@zW?0fm+Ir_|zy+uJP'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_SALT', 'by:XQ^rqzkle)lCWt)Ou`^|gEovb.~NIz9 vPc7c|1Dd&*+/yQ-$F=vBftt;p +m'); // Cambia esto por tu frase aleatoria.
define('NONCE_SALT', 'O?K>^yQ5SepwLHeSU*p.Z~e]o&p]F46`l>JMWE$:$XMDs+XgFQ:uy>fM$~[Mxnl3'); // Cambia esto por tu frase aleatoria.

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';

/**
 * Idioma de WordPress.
 *
 * Cambia lo siguiente para tener WordPress en tu idioma. El correspondiente archivo MO
 * del lenguaje elegido debe encontrarse en wp-content/languages.
 * Por ejemplo, instala ca_ES.mo copiándolo a wp-content/languages y define WPLANG como 'ca_ES'
 * para traducir WordPress al catalán.
 */
define('WPLANG', 'es_ES');

/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

