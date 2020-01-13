<template>
    <div>
        <form action="">
            <div class="form-group">
                <textarea
                class="form-control"
                placeholder="What's on your mind..."
                v-model="post.description" />
            </div>
            <div class="form-group">
                <button
                class="btn btn-primary"
                @click.prevent="createPost()">
                Submit
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import { mapActions } from 'vuex';
export default {
    name: "AddPost",
    data() {
        return {
            post: {
                description: '',
                user_id: this.$gate.authenticatedUserID()
            }
        }
    },
    methods: {
        ...mapActions(['addPost']),
        
        createPost() {
            this.addPost(this.post);
            this.post = ''
        }  
    }
}
</script>

<style>

</style>