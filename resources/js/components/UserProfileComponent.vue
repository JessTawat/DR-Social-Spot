<template>
    <div>
        <h3>Update Profile</h3>
        <div class="card mb-5">
            <div class="card-body">
                <form>
                <div class="form-group">
                    <label >Name</label>
                    <input type="text" class="form-control" placeholder="Enter name" v-model="currentuser.name">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Enter email" v-model="currentuser.email">
                </div>
                <button type="submit" class="btn btn-primary btn-block"  @click.prevent="updateUserinfo()">Submit</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            currentuser: {}
        }
    },
    created() {
        this.user
        this.fetchcurrentuser()
    },
    methods: {
        updateUserinfo() {
            fetch('api/user', {
                method: 'put',
                body: JSON.stringify(this.currentuser),
                headers: {
                    'content-type': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                this.fetchcurrentuser()
                this.currentuser.name = currentuser.name
                this.currentuser.email = currentuser.email
            }).catch(err => console.log(err));

            alert("Saved!")
        },
        fetchcurrentuser() {
            this.currentuser.id = this.user.id
            this.currentuser.name = this.user.name
            this.currentuser.email = this.user.email
        }
    },
    computed: {
        user() {
            return this.$gate.authenticatedUser()
        }
    }
}
</script>