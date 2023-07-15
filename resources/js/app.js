import './bootstrap';
/*
const { hide } = require('@popperjs/core');
const { default: axios } = require('axios');
require('./bootstrap');


window.Vue = require('vue').default;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
    data: {
        elementId: '',
        elementURL:'',
        showSpiner: false,
    },
    methods: {
        getRoute(event) {
            this.elementId = event.currentTarget.getAttribute('data-id');
            this.elementURL = event.currentTarget.getAttribute('href');
        },

        deleteIt(){
            if(this.elementId != '') {
                this.showSpiner=true;
                axios.delete(this.elementURL).then((response) => {

                    this.showSpiner=false;
                    $('#deleteModal').hide();

                    if (response.data.error) {
                        console.log(response.data.message);
                    } else {
                        $("#target"+this.elementId).fadeOut();
                        Toast.fire({
                            icon: 'success',
                            title: response.data.message,
                        })
                    }
                }, (error)=>{
                    this.showSpiner=false;
                    $('#deleteModal').hide();
                    Toast.fire({
                        icon: 'warning',
                        title: response.data.message,
                    })
                    console.log('Error inesperado intente de nuevo mas tarde');
                });
            }
        }
    }
});*/
