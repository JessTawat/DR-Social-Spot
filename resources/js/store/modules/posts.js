import axios from 'axios';

const state = {
    posts: [],
    userposts: []
};

const getters = {
    allPosts: (state) => state.posts,
    allUserPosts: (state) => state.userposts
};

const actions = {
    fetchPosts({ commit }) {
        axios.get('api/posts')
        .then(res => {
            commit('FETCH_POSTS', res.data)
        }).catch(err => {
            console.log(err)
        })
    },
    fetchUserPosts({ commit }){
        axios.get('api/post-user/1')
        .then(res => {
            commit('FETCH_USER_POST', res.data)
        }).catch(err => {
            console.log(err)
        })
    },
    addPost({ commit }, post) {
       axios.post('api/posts', post)
       .then(res => {
           commit('CREATE_POST', res.data)
       }).catch(err => {
           console.log(err)
       })

    }
};

const mutations = {
    FETCH_POSTS(state, posts) {
        return state.posts = posts
    },
    CREATE_POST(state, post) {
        state.posts.unshift(post)
    },
    FETCH_USER_POST(state, userposts) {
        return state.userposts = userposts
    }
};

export default {
    state,
    getters,
    actions,
    mutations
}