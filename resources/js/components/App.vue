<template>
    <div class="main">
        <TodoMain/>
    </div>
</template>

<script>
import TodoMain from './TodoMain.vue'
export default {
    components: {
        TodoMain
    },
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