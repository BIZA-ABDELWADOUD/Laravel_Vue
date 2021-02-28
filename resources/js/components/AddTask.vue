<template>
    <div>

       <!-- Button trigger modal -->
<button type="button" class="btn btn-success my-3" data-toggle="modal" data-target="#exampleModal">
  Add new Task
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form action="">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" v-model="name" id="name" name="name">
                </div>

           </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" @click="taskStore" data-dismiss="modal">Add</button>
      </div>
    </div>
  </div>
</div>

    </div>
</template>

<script>
    export default {

        data() {
           return {
                name:''
           }
        },

        methods: {
            taskStore() {

                axios.post('http://localhost/Laravel_vue/taskslist',{
                    name:this.name
                })
                .then(response => this.$emit('task-added',response))
                .catch(error => console.log(error));
        }

    }
    }
</script>
