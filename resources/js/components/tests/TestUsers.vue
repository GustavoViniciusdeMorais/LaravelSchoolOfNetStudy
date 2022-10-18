<template>
  <div>
    <h1>Tests</h1>
    <ul>
      <li v-for="item in users">
        {{item}}
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      users: [],
    };
  },
  mounted() {
    window.Echo.channel('vikisystems_database_listUsers')
        .listen('getUsers', (users) => {
            this.users.push(users);
            console.log('test');
    });
  }
};
</script>

<style>
</style>