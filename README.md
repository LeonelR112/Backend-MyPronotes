## My ProNotes - Backend

### ![](./main-logo.png)

![](https://icon-icons.com/icons2/2107/PNG/128/file_type_php_icon_130266.png)
![](https://icon-icons.com/icons2/2415/PNG/128/mysql_original_wordmark_logo_icon_146417.png)
![](https://icon-icons.com/icons2/2415/PNG/128/apache_original_wordmark_logo_icon_146643.png)

## Descripción

Es una simple aplicación web en la que cada usuario podrá crear, modificar y guardar sus propias notas.
Éste es el back-end donde se maneja las API-REST ulizando **PHP** y **MySQL**, utilizando la configuración en apache para establecer las rutas y manejar las respuestas en json. Contiene una documentación básica que muestra el funcionamiento de las llamadas a las api y los archivos JSON a enviar.

#### Materiales y librerías 

> - WAMP server
> - Visual Studio Code
> - PHP y MySQL
> - PHP Curl
> - Composer
> - PHPDotEnv (variables de entorno) de [vlucas](https://github.com/vlucas/phpdotenv)

#### Funciones en el Back:
> - Recepción de peticiones a traves de uris personalziadas en apache.
> - Verificación de cada llamado http con un Token, enviado desde el servidor donde se encuentra alojado el front. Con esto se hace una doble verificación de la existencia del usuario para poder realizar el pedido.
> - Validaciones en el token y el JSON que se recive en cada petición.

La aplicación fue creada en conjunto con **Lucas Rodriguez** [(ver su repositorio aquí)]() el cual, utilizando **NUXT.js** y **Vue.js** diseñó la estructura de la página, el sistema de login y la maquetación principal del front-end. _Más información en su repositorio_

