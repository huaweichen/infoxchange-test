<template>
    <div class="container">
        <div class="jumbotron">
            <h1>Welcome to Dashboard</h1>
        </div>
        <router-link class="btn btn-primary btn-lg" to="/persons">
            Persons List
        </router-link>
        <router-link class="btn btn-primary btn-lg" to="/persons/create">
            Add New Person
        </router-link>

        <router-view class="overflow-x-hidden p-6" v-show="$route.path !== '/'"></router-view>
    </div>
</template>

<script>
    export default {
        name: "App",
    }
</script>

<style scoped>

</style>
