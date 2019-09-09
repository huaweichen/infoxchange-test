<template>
    <div class="component--persons-list">
        <h1>Persons List page</h1>
        <div v-if="loading">Loading ...</div>
        <div v-else>
            <div v-if="persons.length === 0">
                <p>No persons yet.
                    <router-link to="/persons/create">Add New Person</router-link>
                </p>
            </div>
            <div class="card" v-for="person in persons">
                <div class="card-header">
                    Name: {{ person.name }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">Gender: {{ person.gender }}</h5>
                    <h5 class="card-title">Age: {{ person.age }}</h5>
                    <router-link><a href="#" class="btn btn-primary">View</a></router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PersonsList",
        mounted() {
            axios.get('/api/persons')
                .then(response => {
                    this.persons = response.data.data;
                    this.loading = false;
                })
                .catch(errors => {
                    this.loading = false;
                    alert('Unable to fetch persons.');
                });
        },
        data: function () {
            return {
                loading: true,
                persons: null
            }
        }
    }
</script>

<style scoped>

</style>
