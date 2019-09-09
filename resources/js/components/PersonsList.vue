<template>
    <div class="component--persons-list">
        <h1>Persons List page</h1>
        <div v-if="loading">Loading ... </div>
        <div class="card" v-for="person in persons">
            <div class="card-body">
                Name: {{ person.name }}
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
