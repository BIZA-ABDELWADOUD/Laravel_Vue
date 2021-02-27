<template>

    <div class="container">
        <add-user @user-added="refresh"></add-user>
        <ul class="list-group">
                <li class="list-group-item" v-for="user in users.data" :key="user.id">
                    <p>{{user.name}}</p>
                    <p>{{user.email}}</p>
                </li>
        </ul>

        <pagination :data="users" @pagination-change-page="getResultsusers"  align="center"  class="mt-3"></pagination>

    </div>
</template>

<script>
    export default {

        data() {
           return{
                users: {}
           }
        },

         created() {
            axios.get('http://localhost/Laravel_vue/users')
                .then(response => this.users = response.data)
                .catch(error => console.log(error));
        },

        methods: {
		// Our method to GET results from a Laravel endpoint
		getResultsusers(page = 1) {
			axios.get('http://localhost/Laravel_vue/users?page=' + page)
				.then(response => {
					this.users = response.data;
				});
		},

        refresh(users) {
            this.users = users.data
        }

        },


        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
