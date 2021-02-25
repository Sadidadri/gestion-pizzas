<template>
    <div id="content">
        <div v-if="this.isAdmin()">
            <h1 class="text-center">Hola Admin</h1>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {

            }
        },
        created() {

            
        },
        mounted(){

        },
        methods: {
            
        }
            
    }
</script>