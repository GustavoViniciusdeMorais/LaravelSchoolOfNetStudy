import store from './vuex/store'

window.Echo.join('vikisystems_database_chatroom')
    .here(users => {
        console.log('usuarios online ')
        console.log(users)

        store.commit('ADD_ONLINE_USERS', users)
    })
    .joining(user => {
        console.log('entrou: ', user)

        store.commit('ADD_ONLINE_USER', user)
    })
    .leaving(user => {
        console.log('saiu: ', user)

        store.commit('REMOVE_ONLINE_USER', user)
    })