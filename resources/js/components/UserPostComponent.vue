<template>
<div>
    <div>
        <h4>My Posts</h4>
        <div class="row">
            <div class="col-lg-8 col-md-10">
                <AddPost />
                <div>
                    <div
                    v-for="post in filterUserPost"
                    :key="post.id"
                    class="card mb-5">
                        <div class="card-body">
                                <h5 class="card-title">
                                    <small class="float-right">{{ post.created_at }}</small>
                                </h5>
                                <p>{{ post.description }}</p>
                                <div class="row">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-outline-info btn-block">
                                            Like
                                        </button>
                                    </div>
                                    <div class="col-6">
                                        <button type="button" class="btn btn-outline-warning btn-block">
                                            Share
                                        </button>
                                    </div>
                                </div>
                                    <addComment :post="post"/>
                                <div>
                                    <div
                                    v-for="comment in post.comments"
                                    :key="comment.id"
                                    >
                                        <ul
                                        class="list-group list-group-flush"
                                        >
                                        <li class="list-group-item">
                                            {{ comment.description }}
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-2">
                <userProfile />
            </div>
        </div>
    </div>
</div>
</template>

<script>
import userProfile from './UserProfileComponent'
import AddPost from './AddPostComponent'
import addComment from './AddCommentComponents'

import { mapGetters, mapActions } from 'vuex';

export default {
    components: {
        AddPost,
        addComment,
        userProfile
    },
    methods: {
        ...mapActions(['fetchPosts'])
    },
    computed: {
        ...mapGetters({
            AllPosts: 'allPosts'
        }),

        filterUserPost: function() {
            let authuser = this.$gate.authenticatedUserID()

            return this.AllPosts.filter(function(i) {
                return i.user_id == authuser
            });
        }
    },
    created() {
        this.fetchPosts();
    }
}

</script>