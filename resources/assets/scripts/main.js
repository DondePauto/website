/* global jQuery */

// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*';

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import buscar from './routes/buscar';
import espacio from './routes/espacio';

/** Populate Router instance with DOM routes */
const routes = new Router({
    common,     // Todas las páginas
    home,       // Página de inicio
    buscar,     // Página de búsqueda
    espacio,    // Página de Espacio Publicitario
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
