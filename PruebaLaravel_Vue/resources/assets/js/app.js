
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Registro de los componentes
Vue.component('example-component', require('./components/ExampleComponent.vue'));
//Vue.component('pokemons-component', require('./components/PokemonsComponent.vue'));
Vue.component('list-of-components', require('./components/pokemons/list.vue'));
//Vue.component('spinner', require('./components/Spinner.vue'));
Vue.component('spinner', require('./components/widgets/spinner.vue'));
//Vue.component('btn-add-pokemon', require('./components/AddPokemonComponent.vue'));
Vue.component('modal-button', require('./components/pokemons/modal-button.vue'));
Vue.component('create-form-pokemon', require('./components/pokemons/add.vue'));

const app = new Vue({
    el: '#app'
});
