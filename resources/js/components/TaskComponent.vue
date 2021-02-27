<template>
    <div class="container">
            <add-task @task-added="refresh"></add-task>
            <ul class="list-group">
                <li class="list-group-item" v-for="task in tasks.data" :key="task.id">
                    <a href="http://">{{task.name}}</a>
                </li>
            </ul>

            <pagination :data="tasks" @pagination-change-page="getResults"  align="center"  class="mt-3"></pagination>
    </div>
</template>

<script>
    export default {

        data(){
            return {
                tasks :{}
            }
        },

        created() {
            axios.get('http://localhost/Laravel_vue/taskslist')
                .then(response => this.tasks = response.data)
                .catch(error => console.log(error));
        },

        methods: {
		// Our method to GET results from a Laravel endpoint
		getResults(page = 1) {
			axios.get('http://localhost/Laravel_vue/taskslist?page=' + page)
				.then(response => {
					this.tasks = response.data;
				});
		},

        refresh(tasks) {
            this.tasks = tasks.data
        }

        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
