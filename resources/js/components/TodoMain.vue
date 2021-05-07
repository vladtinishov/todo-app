<template>
    <div class="main">
        <ul>
            <TodoList v-for="(todo, i) in todosData" 
                :key="i" 
                v-bind:todo="todo"
                v-bind:index="i"
                @delete-todo="deleteTodo"
                @to-up="toUp"
                @to-bottom="toBottom"
            />
        </ul>
    </div>
</template>

<script>
// import TodoMain from './TodoMain.vue'
import TodoList from './TodoList.vue'
export default {
    components: {
        TodoList
    },
    data() {
        return {
            todosData: 0
        }
    },
    mounted(){
        this.getData(); 
    },
    methods: {
        deleteTodo(id){
            fetch('/delete/'+id)
                .then(this.getData);
        },
        getData(){
            fetch('/all')
                .then(response => response.json())
                .then(todos => this.todosData = todos) 
        },
        toUp(id){
            fetch('/up/'+id)
                .then(this.getData);
        },
        toBottom(id){
            fetch('/down/'+id)
                .then(this.getData);
        }
    }
}
</script>

<style scoped>
.main{
    width: 100%;
    max-width: 700px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
}
ul{
    margin: 0;
    padding: 0;
    width: 100%;
}
</style>