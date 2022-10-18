# Broad Cast Test

```
https://medium.com/@fabioobueno/laravel-socket-io-3a7c2de6e21a
```

### ./routes/channels.php
```

Broadcast::channel('listUsers', function ($data) {
    return $data;
});

```

### ./app/Events/GetUsers.php
```

class GetUsers implements ShouldBroadcast

public function __construct($users)
{
    $this->users = $users;
}

public function broadcastAs()
{
    return 'getUsers';
}

//Valores que serão enviados com o evento
public function broadcastWith()
{
    return [
        'users' => $this->users,
    ];
}

```

### ./app/Http/Controllers/TestController.php
```

public function index()
{
    return view('chat/tests');
}

```

### ./resources/js/app.js
```
import TestUsers from './components/tests/TestUsers'

const app = new Vue({
    el: '#app',
    store: store,
    components: {
        'test-users': TestUsers
    }
});

```

### ./resources/views/chat/tests.blade.php
```

@extends('templates.main')

@section('title', 'Chat - Gustavo')

@section('content')
    <test-users></test-users>
@endsection

```

### 
```

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
        .listen('.getUsers', (users) => {
            this.users.push(users);
            console.log('test');
    });
  }
};
</script>

```
