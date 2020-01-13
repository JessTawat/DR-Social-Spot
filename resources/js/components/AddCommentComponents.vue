<template>
    <div class="input-group mt-3">
        <input
        type="text"
        class="form-control"
        placeholder="Comments ..."
        v-model="comment.description"
        >
        <div class="input-group-append">
            <button class="btn btn-outline-primary" @click.prevent="createComment()">
                Submit
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: "addComment",
    props: ['post'],
    data() {
        return {
            comment: {
                description: '',
                post_id: this.post.id,
                user_id: this.$gate.authenticatedUserID()
            }
        }
    },
    created() {
        this.reloadComments()
    },
    methods: {
        createComment() {
            fetch('api/comments',{
                method: 'post',
                body: JSON.stringify(this.comment),
                headers: {
                    'content-type': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                this.reloadComments()
                this.comment.description = ''
            })
            .catch(err => console.log(err))
        },
        reloadComments() {
            return this.comment
        }
    },

}
</script>