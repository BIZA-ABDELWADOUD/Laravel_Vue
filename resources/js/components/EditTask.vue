<template>
    <div>
<!-- Modal -->
            <div class="modal fade" id="modifyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modify Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" v-model="taskToedit.name">
                            </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" @click="updateTask" data-dismiss="modal">Modify</button>
                </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {

        props:['taskToedit'],

        methods : {

            updateTask() {

            axios.patch('http://localhost/Laravel_vue/tasks/edit/' + this.taskToedit.id, {
                name : this.taskToedit.name
            })
            .then(response => this.$emit('task-updated',response))
            .catch(error =>console.log(error));

            }
        }
    }
</script>
