<template>
    <div class="main">
        <div class="loading" v-if="load">
            <div class="text"><h3>Загрузка</h3></div>
        </div>
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
import TodoList from './TodoList.vue'
export default {
    components: {
        TodoList
    },
    data() {
        return {
            todosData: 0,
            load: false,
        }
    },
    mounted(){
        this.getData(); 
    },
    methods: {
        openLoad(){
            this.load = true
        },
        closeLoad(){
            this.load = false    
        },
        deleteTodo(id){
            this.openLoad()
            fetch('/delete/'+id)
                .then(this.getData)
                .then(this.closeLoad);
        },
        getData(){
            this.openLoad()
            fetch('/all')
                .then(response => response.json())
                .then(todos => this.todosData = todos) 
                .then(this.closeLoad);
        },
        toUp(id){
            this.openLoad()
            fetch('/up/'+id)
                .then(this.getData)
                .then(this.closeLoad);
        },
        toBottom(id){
            this.openLoad()
            fetch('/down/'+id)
                .then(this.getData)
                .then(this.closeLoad);
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
.loading{
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
    background: rgba(134,183,231,.1);
    display: flex;
    justify-content: center;
    align-items: center;
}
.text{
    width: 300px;
    height: 300px;
    background: white;
    border-radius: 5px;
    box-shadow: 0px 5px 0px 0px rgba(134,183,231,.5);
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: monospace;

}
</style>