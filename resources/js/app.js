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
        Statuts: Statuts,
    },
        
    methods: {
        /**
         * get toutes les infos de la table vehicule et les pousse dans vehiculesData[]
         */
        getAjaxInfo(){
            var baseThis = this;
            axios.get('/ajaxVehicule')
            .then(function (response) {
                // handle success
                baseThis.vehiculesData = response.data;
                
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
        },

        postRecherche(){
            var baseThis = this;
            axios.post('/ajaxRecherche',{
                imat: baseThis.formImat,
                id_statut: baseThis.formStatut,
                marque: baseThis.formMarque,
                modele: baseThis.formModele,
            })           
            .then(function (response) {
                // handle success
                baseThis.vehiculesData = response.data;
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
        changeStatut: function(statut, evt){

            if (evt.added){
                var id_statut = statut;
                var postVehicule = evt.added.element;
                postVehicule.id_statut = id_statut;
    
                axios.post('/ajaxVehicule', {
                    vehicule: postVehicule,
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
            var baseThis = this;
            axios.get('/ajaxModal',{

                params: {
                    id_vehicule: id_vehicule,
                }
            })
            .then(function (response) {
                baseThis.vehiculeModal = response.data;

                baseThis.vehiculeModal.link = 'vehicule/image/'+response.data.id;

            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
        },

        softDeleteVehicules: function(id_vehicule){
            var baseThis = this;
            axios.post('vehicule/delete',{
                id_vehicule: id_vehicule,
            })           
            .then(function (response) {
                baseThis.postRecherche();
                // handle success
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
        },

        
        
        

        log: function(evt) {
            console.log(evt);
        },

    }, 

    computed: {
        dragOptions() {
            return {
                animation: 150,
                ghostClass: "ghost"
            };
        }
    },

    

    /**
     * appelle getAjaxInfo au chargement de la page
     */
    mounted(){
        this.getAjaxInfo();

    },
});
