<template>
    <div>
        <h5>Friend list</h5>
        <div
        v-for="friend in friends" :key="friend.id"
        class="card">
            <ul v-if="checkUserself == friend.id" class="list-group list-group-flush">
                <a class="list-group-item">
                    <router-link to="/user">{{ friend.name }} (Me)</router-link>
                </a>
            </ul>
            <ul v-else class="list-group list-group-flush">
                <li class="list-group-item">{{ friend.name }}</li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: "allFriends",
    data() {
        return {
            friends: []
        }
    },
    created() {
        this.fetchAllUser();
        console.log(this.checkUserself)
    },
    methods: {
        fetchAllUser() {
            axios.get('api/users')
            .then(res => {
                this.friends = res.data
            }).catch(err => console.log(err));
        }
    },
    computed: {
        checkUserself() {
            return this.$gate.authenticatedUserID()
        }
    }
}
</script>