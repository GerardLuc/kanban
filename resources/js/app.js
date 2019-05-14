require('./bootstrap');

window.Vue = require('vue');

import draggable from 'vuedraggable';

const app = new Vue({
    el: '#app',
    components : {
        'draggable': draggable
    },

    data:{
        vehiculesData: [],
        vehiculeModal: [],
        formImat : '',
        formModele : '',
        formMarque : '',
        formStatut : '',

    },
        
    methods: {
        /**
         * get toutes les infos de la table vehicule et les pousse dans vehiculesData[]
         */
        getInfo(){
            var chaipa = this;
            axios.get('/ajaxVehicule')
            .then(function (response) {
                // handle success
                chaipa.vehiculesData = response.data;
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
        },

        postRecherche(){
            var chaipa = this;
            axios.post('/vehicule',{
                imat: chaipa.formImat,
                id_statut: chaipa.formStatut,
                marque: chaipa.formMarque,
                modele: chaipa.formModele,
            })           
            .then(function (response) {
                // handle success
                chaipa.vehiculesData = response.data;
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
        },

        
        /**
         * drag and drop les cartes de vehicules utilisant Draggable
         * @param {vehicule} statut 
         * @param {onDrop} evt 
         */
        Change: function(statut, evt){

            if (evt.added){
                var to = statut;
                var send = evt.added.element;
                send.id_statut = to;
    
                axios.post('/ajaxVehicule', {
                    vehicule: send,
                    })
                    .then(function (response) {
                        
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },

        /**
         * get les parametres d'un vehicule pour les pousser dans vehiculeModal pour les afficher dans une modale
         * @param {vehicule} id_vehicule 
         */
        getModal: function(id_vehicule){
            var chaipa = this;


            axios.get('/ajaxModal',{

                params: {
                    id_vehicule: id_vehicule,
                }
            })
            .then(function (response) {
                chaipa.vehiculeModal = response.data;

                chaipa.vehiculeModal.link = 'vehicule/image/'+response.data.id;

            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
        },

        softDelete: function(id_vehicule){
            var chaipa = this;
            axios.post('vehicule/delete',{
                id_vehicule: id_vehicule,
            })           
            .then(function (response) {
                chaipa.postRecherche();
                // handle success
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
    /**
     * appelle getInfo au chargement de la page
     */
    mounted(){
        this.getInfo();
    },
});