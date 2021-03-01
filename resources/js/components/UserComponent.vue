<template>

    <div class="container">
        <add-user @user-added="refresh"></add-user>
        <ul class="list-group">
                <li class="list-group-item" v-for="user in users.data" :key="user.id" style="display:flex;justify-content:space-between;align-items:center">
                    <div>
                    <p>{{user.name}}</p>
                    <p>{{user.email}}</p>
                    </div>
                    <div>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modifyuser" @click="getUser(user.id)">
                        Modify user
                    </button>
                    <button type="button" class="btn btn-danger" @click="deleteUser(user.id)">
                        Delete user
                    </button>
                    </div>

                </li>
                <edit-user v-bind:user="user" @user-updated="refresh"></edit-user>
        </ul>

        <pagination :data="users" @pagination-change-page="getResultsusers" class="mt-3"></pagination>

    </div>
</template>

<script>
    export default {

        data() {
           return{
                users: {},
                //username: ''
                //user :[]
                user : {
                    name:'',
                    email:''
                }
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

        getUser(id) {
            axios.get('http://localhost/Laravel_vue/users/edit/' + id)
            .then(response => this.user = response.data)
            .catch(error =>console.log(error));
        },

           deleteUser(id) {

            axios.delete('http://localhost/Laravel_vue/users/' + id)
            .then(response => this.users = response.data)
            .catch(error =>console.log(error));
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
