<p align="center"><img src="https://files.dondepauto.co/brand/logo-black.png?w=500"></p>

### Descripción

En DóndePauto encuentras los medios publicitarios más efectivos para tu negocio y asesoría especializada para que llegues a tus verdaderos clientes.

Este repositorio contiene el Tema de WordPress de nuestro sitio web, basado en [Sage](https://roots.io/sage).

### Requerimientos

| Prerequisito     | Cómo verificar   | Cómo instalar                                       |
| ---------------- | ---------------- | --------------------------------------------------- |
| WordPress >= 4.7 | wp-admin         | [Bedrock](https://roots.io/bedrock)                 |
| PHP >= 7.0       | `php -v`         | [php.net](http://php.net/manual/en/install.php)     |
| Composer         | `which composer` | [getcomposer.org](https://getcomposer.org/download) |
| Node.js >= 6.9.x | `node -v`        | [nodejs.org](http://nodejs.org/)                    |
| Yarn             | `which yarn`     | [yarnpkg.com](https://yarnpkg.com/en/docs/install)  |

### Instalación

1. Clonar el repositorio dentro del directorio de temas de WordPress:

```shell
# @ example.com/app/themes/
$ git clone https://github.com/DondePauto/wp-theme
```

2. Actualizar las dependencias de `composer` y `npm`:

```shell
$ composer update
$ npm install
```

3. Compilar las dependencias usando `yarn`:

```shell
$ yarn run build             # Compila y optimiza los recursos
$ yarn run build --watch     # Compila los recursos cuando se realizan cambios
$ yarn run build:production  # Compila los recursos para el ambiente de producción.
```

### Contacto

* **Gerencia:** [Leonardo Rueda](https://linkedin.com/in/leonardorueda)
* **Desarrollo:** [Andrés Felipe Torres](https://github.com/felipeandres254)
