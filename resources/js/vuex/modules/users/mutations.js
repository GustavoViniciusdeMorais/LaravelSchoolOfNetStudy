import state from "./state"

export default {
    ADD_ALL_USERS(state, users) {
        state.users = users
    },

    ADD_ONLINE_USERS(state, users) {
        state.onlineUsers = users
    },

    ADD_ONLINE_USER(state, user) {
        state.onlineUsers.unshift(user)
    },

    REMOVE_ONLINE_USER(state, user) {
        state.onlineUsers = state.onlineUsers.filter(person => {
            return person.email != user.email
        })
    }
}