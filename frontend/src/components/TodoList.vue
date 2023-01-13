<script>
import axios from 'axios'; //Andiamo a richiamare axios facendo 'npm install axios'

const API_URL = 'http://localhost:8888/' //creamo una costate con il nostro server

export default {
    name: 'TodoList',
    methods: {

        getAllData() {

            //prendiamo il nostro server ed aggiungiamo la cartella che dobbiamo aggiungere
            axios.get(API_URL + 'api.php')
                .then(res => {

                    //ci prendiamo il data dell'axios (comando di base di axios)
                    const data = res.data;

                    //per verificare la connessione con file php facciamo un console log
                    console.log(data)
                })

        }
    },
    mounted() {
        this.getAllData();
    }
}
</script>

<template>
    <h1>ciao</h1>
</template>

<style scoped>

</style>
