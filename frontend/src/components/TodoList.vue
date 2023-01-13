<script>
import axios from 'axios'; //Andiamo a richiamare axios facendo 'npm install axios'

const API_URL = 'http://localhost:8888/' //creamo una costate con il nostro server

export default {
    name: 'TodoList',
    data() {
        return {
            toDoList: [],
            newTodoText: ""
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

        },

        //creamo un nuovo metodo con il prevent default
        createNewTask(e) {
            e.preventDefault();

            // richiamo al variante e creamo dei paramentri
            const newTodoText = this.newTodoText;

            // il parametro sarà che inseriremo nell'array "text: newTodoText"
            const params = {
                params: {
                    "text": newTodoText
                }
            };

            // richiamo l'API aggiungendo i parametri
            axios.get(API_URL + "api_create_new_task.php", params)
                .then(() => {

                    // con questo richiamo, quando scriveremo lla nuova task si resetta completamente l'input text
                    this.newTodoText = "";
                    this.getAllData();
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

    <!-- creo un form che richiama newTodoText, creo un collegamento -->

    <form @submit="createNewTask"> <!-- collegamento con submit della fuction -->
        <input type="text" name="text" v-model="newTodoText"> <!-- collegamento -->
        <input type="submit" value="Create New Task">
    </form>
</template>

<style scoped>

</style>
