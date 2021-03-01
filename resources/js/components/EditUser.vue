<template>
    <div>

        <!-- Modal -->
<div class="modal fade" id="modifyuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form action="">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" v-model="user.name"  id="name" name="name">
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control" id="email" name="email" v-model="user.email">
                </div>

           </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" @click="updateUser" data-dismiss="modal">Modify</button>
      </div>
    </div>
  </div>
</div>

    </div>
</template>

<script>
export default {
        props:['user'],

        methods: {

            updateUser() {

            axios.patch('http://localhost/Laravel_vue/users/edit/' + this.user.id, {
                name : this.user.name,
                email : this.user.email
            })
            .then(response => this.$emit('user-updated',response))
            .catch(error =>console.log(error));

            }

        }
}
</script>
