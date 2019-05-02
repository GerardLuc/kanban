/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueDraggable from 'vue-draggable';
console.log(VueDraggable);
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
Vue.use(VueDraggable);


const app = new Vue({
    el: '#app',
    data:{
        vehiculesData: [],
        options: {
            dropzoneSelector: '.dropzone',
            draggableSelector: '.draggable',
            multipleDropzonesItemsDraggingEnabled: true,
          }
        },
        

    methods: {
        getInfo(){
            var chaipa = this;
            axios.get('/jsonVehicule')
            .then(function (response) {
                // handle success
                // console.log(response);
                // console.log(response.data.vehicules);
                chaipa.vehiculesData = _.groupBy(response.data, 'statut');
              })
              .catch(function (error) {
                // handle error
                console.log(error);
              })
        }
    },

    mounted(){

        console.log(this.options)
        this.getInfo()
    },
    
    
});
