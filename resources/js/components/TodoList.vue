<template>
    <li>
        <router-link v-bind:to="'/single/' + todo.id">
            {{todo.title}} 
            <br/> 
            <span>{{date}}</span>
        </router-link>
        <div class="buttons">
            <button @click="deleteTodo" class="delete">&times;</button>
            <div class="changePos">
                <button @click="up" class="button">
                    <div class="outer">
                        <div class="up-inner"></div>
                    </div>
                </button>
                <button @click="bottom" class="button">
                    <div class="outer">
                        <div class="bottom-inner"></div>
                    </div>
                </button>
            </div>
        </div>
    </li>
</template>
<script>
export default {
    props: {
        todo: {
            type: Object,
            require: true,
        },
        index: {
            type: Number
        }
    },
    data(){
        return {
            date: this.todo.created_at.split('T')[0]
        }
    },
    methods: {
        deleteTodo(){
            this.$emit('delete-todo', this.todo.id);
        },
        up(){
            this.$emit('to-up', this.todo.id);
        },
        bottom(){
            this.$emit('to-bottom', this.todo.id);
        }
    }
}
</script>

<style scoped>
li{
    display: flex;
    justify-content: space-between;
    align-items: center;

    width: 100%;
    box-sizing: border-box;
    padding: 0 5px;
    margin: 10px 0;

    font-family: monospace;
}
span{
    opacity: .5;
}
.buttons{
    display: flex;
    align-items: center;
}
.changePos{
    display: flex;
    flex-direction: column;
}
.button{
    width: 30px;
    height: 15px;
    overflow: hidden;
    border: none;
    background: none;
    margin: 2px;
    opacity: .5;
    transition: .1s ease;
}
.button:hover{
    opacity: 1;
}
.outer{
    position: relative;
}
.up-inner{
    position: absolute;
    top: -1px;
    left: 0;
    width: 21px;
    height: 21px;
    transform: rotate(45deg);
    background: rgb(67, 117, 113);
}
.bottom-inner{
    position: absolute;
    bottom: 0;
    left: 0;
    width: 21px;
    height: 21px;
    transform: rotate(45deg);
    background: red;
    background: rgb(67, 117, 113);
}
.delete{
    border: none;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    background: red;
    color: white;
    margin-right: 10px;
    opacity: .5;
}
.delete:hover{
    opacity: 1;
}

</style>