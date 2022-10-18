import store from './vuex/store'

window.Echo.channel('chatroom')
    .listen('.my-event', (e) => {
        console.log('asdfasfd');
        store.commit('ADD_ALL_USERS', ['asfasdf']);
    });