@extends('templates.main')

@section('content')
    <h1>GraphQL</h1>

    <div>
        <ul id="test">

        </ul>
    </div>

    <script>
        var queryUsers = `
            query test {
                user {
                    id,
                    name,
                    email
                }
            }
        `;

        fetch('/graphql', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({query: queryUsers})
        })
        .then(r => r.json())
        .then(data => {
            // console.log('data test:', data.data.user)
            data.data.user.forEach((item, index) => {
                console.log(item,index);
                var ul = document.getElementById("test");
                var li = document.createElement("li");
                li.appendChild(document.createTextNode(item.name));
                ul.appendChild(li);
            })
        });

    </script>

@endsection