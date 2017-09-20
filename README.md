<p align="center"><img src="http://dondepauto.co/newsletter/images/v3/newsletterMainHeaderDPLogo.png"></p>

## [DondePauto](http://dondepauto.co)

### Descripción

En DóndePauto encuentras los medios publicitarios más efectivos para tu negocio y asesoría especializada para que llegues a tus verdaderos clientes.

Este repositorio contiene el Tema de WordPress de nuestro sitio web, basado en [Sage](https://roots.io/sage)

### Requerimientos

| Prerequisito    | Cómo verificar | Cómo instalar
| --------------- | -------------- | ------------- |
| PHP >= 5.4.x    | `php -v`       | [php.net](http://php.net/manual/en/install.php) |
| Node.js >= 4.5  | `node -v`      | [nodejs.org](http://nodejs.org/) |
| gulp >= 3.8.10  | `gulp -v`      | `npm install -g gulp` |
| Bower >= 1.3.12 | `bower -v`     | `npm install -g bower` |

### Instalación

1. Clonar el repositorio dentro del directorio de temas de WordPress:

```shell
# @ example.com/wp-content/themes/
$ git clone https://github.com/DondePauto/dondepauto-theme
```

2. Actualizar las dependencias de `composer`, `npm` y `bower`:

```shell
$ composer update
$ npm install
$ bower install
```

3. Compilar las dependencias usando `gulp`:

```shell
$ gulp               # Compila y optimiza los recursos
$ gulp watch         # Compila los recursos cuando se realizan cambios
$ gulp --production  # Compila los recursos para el ambiente de producción.
```

### Contacto

* **Gerencia:** [Leonardo Rueda](https://linkedin.com/in/leonardorueda)
* **Desarrollo:** [Andrés Felipe Torres](https://github.com/felipeandres254)
