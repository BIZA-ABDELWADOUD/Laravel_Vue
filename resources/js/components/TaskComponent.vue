<template>
    <div class="container">
        <div class="form-group">
            <div class="col-row">
                <input type="text" class="form-control" placeholder="search" @keyup="searchTask" v-model="q">
            </div>
        </div>
            <add-task @task-added="refresh"></add-task>
            <ul class="list-group">
                <li class="list-group-item" v-for="task in tasks.data" :key="task.id" style="display:flex;justify-content:space-between;align-items:center">
                    <a href="http://">{{task.name}}</a>
                    <div>
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modifyModal" @click="getTask(task.id)">
                            Modify task
                           </button>

                           <button type="button" class="btn btn-danger" @click="deleteTask(task.id)">
                            Delete task
                           </button>
                    </div>

                </li>
                <edit-task v-bind:taskToedit="taskToedit" @task-updated="refresh"></edit-task>

            </ul>

            <pagination :data="tasks" @pagination-change-page="getResults" class="mt-3"></pagination>
    </div>
</template>

<script>
    export default {

        data(){
            return {
                tasks : {},
                taskToedit: '',
                q:''
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
        },

         getTask(id) {
            axios.get('http://localhost/Laravel_vue/tasks/edit/' + id)
            .then(response => this.taskToedit = response.data)
            .catch(error =>console.log(error));
        },

        deleteTask(id) {

            axios.delete('http://localhost/Laravel_vue/tasks/' + id)
            .then(response => this.tasks = response.data)
            .catch(error =>console.log(error));
        },

        searchTask() {

            if(this.q.length > 0) {

                 axios.get('http://localhost/Laravel_vue/taskslist/' + this.q)
                .then(response => this.tasks = response.data)
                .catch(error => console.log(error));
            }

            else {
                axios.get('http://localhost/Laravel_vue/taskslist')
                .then(response => this.tasks = response.data)
                .catch(error => console.log(error));
            }


        }

        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
