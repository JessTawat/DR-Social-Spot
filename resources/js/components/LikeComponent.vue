<template>
    <div>
        <button
        type="button"
        class="btn btn-outline-info btn-block"
        @click.prevent="postlikeCounter()"
        >
            Like
        </button>
        <div class="mt-2">
            <p>like: {{ postlike }}</p>
        </div>
    </div>
</template>

<script>
export default {
    props: ['post'],
    data() {
        return {
            postlike: 0
        }
    },
    methods: {
        postlikeCounter() {
            this.postlike += 1
        }
    }
}
</script>