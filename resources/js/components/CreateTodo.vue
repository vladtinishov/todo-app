<template>
    <div class="main">
        <div class="form">
            <input type="text" id="title" placeholder="заголовок">
            <textarea type="text" id="content" placeholder="содержимое"></textarea>
            <button @click="createTodo">Создать</button>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    methods: {
        createTodo(){
            let title = document.getElementById('title').value
            let content = document.getElementById('content').value
            const todoData = { title: 0, title: 0 }
            todoData.title = title
            todoData.content = content
            axios.post('/insert', todoData).then(data => console.log(data.data));
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
    align-items: center;
}
.form{
    width: 500px;
    display: flex;
    flex-direction: column;
    box-sizing: border-box;
    padding: 50px;
}
.form button{
    width: 150px;
    margin-top: 20px;
}
.form input{
    font-size: 15px;
}
.form textarea{
    font-size: 15px;
}
.form textarea{
    margin-top: 20px;
}
</style>