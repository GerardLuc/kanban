/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import draggable from 'vuedraggable';
// console.log(draggable);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// Vue.use(VueDraggable);

// Vue.use(draggable);


const app = new Vue({
    el: '#app',
    components : {
        'draggable': draggable
    },
    data:{

        vehiculesData: [],
        
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
                // console.log(chaipa.vehiculesData);
              })
              .catch(function (error) {
                // handle error
                console.log(error);
              })
              
        },
        
        post: function(evt){
            var chaipa = this;
            console.log(evt);

            // console.log(evt.to.dataset.statut);
            var to = evt.to.dataset.statut;
            var send = evt.draggedContext.element;

            send.statut = to;

            axios.post('/jsonVehicule', {
                vehicule: send,
                })
                .then(function (response) {
                    
                    // console.log(response);
                    // console.log(chaipa.vehiculesData);

                })
                .catch(function (error) {
                    console.log(error);
                });

        },


        log: function(evt) {
        console.log(evt);
        }

        
  
    },
    

    mounted(){

        this.getInfo()
    },
});