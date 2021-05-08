<template>
    <div class="todo">
        <h1>{{ todo.title }}</h1>
        <span>{{ getDate }}</span>
        <p>{{ todo.content }}</p>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    data() {
        return {
            todo: 0,
        }
    },
    mounted() {
        let id = this.$route.params.id
        axios.get('/single/' + id)
            .then(data => this.todo = data.data)
    },
    computed: {
        getDate() {
            let date = this.todo.created_at.split('T')[0]
            return date;
        }
    }
}
</script>

<style scoped>
.todo{
    width: 100%;
    max-width: 700px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    font-family: monospace;
}
p{
    margin-top: 20px;
}
</style>

