/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
var btn = document.querySelector('.sidenav-toggle');
var sidebar = document.querySelector('.sidenav');
var overlay = document.getElementById('overlay');

btn.addEventListener('click', () => {
    sidebar.classList.add('sidenav-show');
    overlay.classList.add('show');
    btn.classList.add('is-active');
    
    overlay.addEventListener('click', () => {
        overlay.classList.remove('show');
        sidebar.classList.remove('sidenav-show');
        btn.classList.remove('is-active');

    })
})

const topBtn = document.getElementById('top-navbar-toggle');
const topNavbar = document.querySelector('.top-navbar');
if(topBtn != null) {
    topBtn.addEventListener('click', () => {
        topNavbar.classList.add('top-navbar-show');
        overlay.classList.add('show');
    
        overlay.addEventListener('click', () => {
            overlay.classList.remove('show');
            topNavbar.classList.remove('top-navbar-show');
        })
    })
}


var offset = 0;
const navbar = document.querySelector('.navbar');
const sidenav = document.querySelector('.sidenav');
document.addEventListener('scroll', () => {
    sidebar.classList.contains('sidenav-show') ? offset = 0 : offset = window.pageYOffset;
    if (offset >= 50){
        navbar.classList.add('sticky-top');
        //sidenav.classList.add('sticky-top');
    }
    else {
        navbar.classList.remove('sticky-top');
        //sidenav.classList.remove('sticky-top');
    }
})
// SideNav Initialization
//$(".button-collapse").sidenav();

//new WOW().init();


$('.carousel').carousel()



