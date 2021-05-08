<template>
    <div class="main">
        <div v-if="warning" class="warning">
            Заполните все поля
        </div>
        <div v-if="success" class="success">
            Запись была добавлена
        </div>
        <div class="form">
            <input type="text" id="title" placeholder="заголовок">
            <textarea type="text" id="content" placeholder="содержимое"></textarea>
            <button class="btn-primary" @click="createTodo">Создать</button>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    data() {
        return {
            warning: false,
            success: false,
        }
    },
    methods: {
        createTodo(){
            let title = document.getElementById('title').value
            let content = document.getElementById('content').value
            if(title == '' && content == '') {
                this.warning = true;
                this.success = false
            } else {
                const todoData = { title: 0, title: 0 }
                todoData.title = title
                todoData.content = content
                axios.post('/insert', todoData).then(data => console.log(data.data));

                this.warning = false
                this.success = true

                document.getElementById('title').value = ''
                document.getElementById('content').value = ''
            }
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
.warning{
    background: rgb(221, 67, 67);
    padding: 5px;
    font-family: monospace;
    color: white;
    border-radius: 4px;
}
.success{
    background: rgb(105, 185, 129);
    padding: 5px;
    font-family: monospace;
    color: white;
    border-radius: 4px;
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