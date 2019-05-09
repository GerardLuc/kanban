require('./bootstrap');

window.Vue = require('vue');

import draggable from 'vuedraggable';
// console.log(draggable);

const app = new Vue({
    el: '#app',
    components : {
        'draggable': draggable
    },

    data:{
        vehiculesData: [],
        vehiculeModal: [],
    },
        
    methods: {
        getInfo(){
            var chaipa = this;
            axios.get('/ajaxVehicule')
            .then(function (response) {
                // handle success
                // console.log(response);
                // console.log(response.data.vehicules);
                chaipa.vehiculesData = response.data;
                // console.log(chaipa.vehiculesData);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
        },
        
        Change: function(statut, evt){

            if (evt.added){
                // console.log(evt.added.element);

                var to = statut;
                var send = evt.added.element;
                send.id_statut = to;

                // console.log(send.id_statut);
    
                axios.post('/ajaxVehicule', {
                    vehicule: send,
                    })
                    .then(function (response) {
                        
                        // console.log(response);
                        // console.log('bruh');
                        // chaipa.getInfo();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
            // console.log(evt.to.dataset.statut);
        },

        getModal(id_vehicule){
            var chaipa = this;
            axios.get('/ajaxModal',{
               id_vehicule: id_vehicule,
            })
            .then(function (response) {
                chaipa.vehiculeModal = response.data;

                console.log(response);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
        },

        log: function(evt) {
        console.log(evt);
        }
    },    

    mounted(){
        this.getInfo();
    },
});