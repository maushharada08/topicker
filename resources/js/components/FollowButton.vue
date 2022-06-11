<template>
    <div>
        <!-- <button>Follow</button> -->
        <button class="btn btn-success rounded-pill py-1 px-3" @click="followTopic" v-text="buttonText"></button>
    </div>
</template>

<script>
import axios from 'axios'

    export default {
        props: ['topicId', 'follows'],

        mounted() {
            console.log('Component mounted.')
        },

        data: function(){
            return {
                status: this.follows,
            }
        },

        methods:{
            followTopic(){
                axios.post('/follow/' + this.topicId )
                    .then(response => {
                        this.status = ! this.status;
                        console.log( response.data );
                    })
                    .catch( errors => {
                        if ( errors.response.status == 401 ){
                            window.location = '/login';
                        }
                    });
            }
        },

        computed: {
            buttonText(){
                return ( this.status ) ? 'ピック解除' : 'ピック';
            }
        }
    }
</script>
