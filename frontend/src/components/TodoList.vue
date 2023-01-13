<script>
import axios from 'axios'; //Andiamo a richiamare axios facendo 'npm install axios'

const API_URL = 'http://localhost:8888/' //creamo una costate con il nostro server

export default {
    name: 'TodoList',
    data() {
        return {
            toDoList: [],
            newToDoText: ""
        }
    },
    methods: {

        getAllData() {

            //prendiamo il nostro server ed aggiungiamo la cartella che dobbiamo aggiungere
            axios.get(API_URL + 'api.php')
                .then(res => {

                    //ci prendiamo il data dell'axios (comando di base di axios)
                    const data = res.data;

                    //per verificare la connessione con file php facciamo un console log
                    // console.log(data)

                    // stampiamo todolist in vue 
                    this.toDoList = data;
                })

        }
    },
    mounted() {
        this.getAllData();
    }
}
</script>

<template>
    <ul>
        <li v-for="(toDoLem, i) in toDoList" key="'i'"> {{ toDoLem.text }}</li>
    </ul>
</template>

<style scoped>

</style>
