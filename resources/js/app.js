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
        
        post: function(statut, evt){
            var chaipa = this;

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

        log: function(evt) {
        console.log(evt);
        }
    },    

    mounted(){
        this.getInfo();
    },
});