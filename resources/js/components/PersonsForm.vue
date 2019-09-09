<template>
    <div class="component--persons-form">
        <form @submit.prevent="submitForm()">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="name ... " v-model="form.name">
                <p class="text-danger" v-text="errorMessage('name')"></p>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <input type="text" class="form-control" id="gender" placeholder="gender ... " v-model="form.gender">
                <p class="text-danger" v-text="errorMessage('gender')"></p>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="text" class="form-control" id="age" placeholder="age ... " v-model="form.age">
                <p class="text-danger" v-text="errorMessage('age')"></p>
            </div>
            <button type="submit" class="btn btn-primary">Add New Person</button>
        </form>
    </div>
</template>

<script>
    export default {
        name: "PersonsForm",
        data: function () {
            return {
                form: {
                    'name': '',
                    'gender': '',
                    'age': '',
                },
                errors: null
            }
        },
        computed: {
            hasError: function () {
                return this.errors !== null;
            }
        },
        methods: {
            submitForm: function () {
                axios.post('/api/persons', this.form)
                    .then(response => {
                        if (
                            typeof response.data.data !== 'undefined' &&
                            response.status === 201
                        ) {
                            this.$router.push('/persons');
                        }
                    })
                    .catch(errors => {
                        if (
                            typeof errors.response.data !== 'undefined' &&
                            typeof errors.response.data.errors !== 'undefined'
                        ) {
                            this.errors = errors.response.data.errors;
                        }
                    });
            },
            errorMessage: function (fieldName) {
                if (this.hasError && typeof this.errors[fieldName] !== 'undefined') {
                    return this.errors[fieldName][0];
                }
            }
        }
    }
</script>

<style scoped>

</style>
