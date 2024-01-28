<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }

        body {
            padding-left: 10px;
            padding-right: 10px;
        }

        .grid-container {
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
        }

        .grid-container h1 {
            margin-top: 50px;
            margin-bottom: 10px;
        }

        .grid {
            display: grid;
            grid-template-columns: auto 1fr 1fr auto;
            column-gap: 30px;
            row-gap: 10px;
            padding: 10px;
            border: 1px solid black;
            border-radius: 5px;
        }

        .grid .header {
            font-weight: bold;
            margin-bottom: 20px;
        }

        .grid button {
            padding: 5px 10px;
        }

        form {
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 20px;
        }

        form .inputs {
            display: flex;
            flex-direction: column;
        }

        form label {
            margin-top: 20px;
        }

        form input,
        button {
            padding: 5px 10px;
        }

        form button {
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <form action="/" method="POST">
        <h1>Create new user</h1>

        <div class="inputs">
            <label for="formFirstName">First name:</label>
            <input type="text" name="firstName" id="formFirstName">
            <label for="formLastName">Last name:</label>
            <input type="text" name="lastName" id="formLastName">
            <button type="submit">OK</button>
        </div>
    </form>

    <div class="grid-container">
        <h1>List of users</h1>

        <div class="grid">
            <div class="header">ID</div>
            <div class="header">First name</div>
            <div class="header">Last name</div>
            <div class="header">Actions</div>

            <?php
            foreach ($users as $user) {
                $id = $user['id'];
                $firstName = $user['first_name'];
                $lastName = $user['last_name'];

                echo '<div class="id">' . $id . '</div>';
                echo '<div class="first-name">' . $firstName . '</div>';
                echo '<div class="last-name">' . $lastName . '</div>';
                echo '<div class="actions"> <button id="' . $id . '">DELETE</button> </div>';
            }
            ?>
        </div>
    </div>

    <script>
        document.querySelectorAll(".actions>button").forEach(button => {
            button.addEventListener("click", () => {
                fetch(`/${button.getAttribute("id")}`, {
                        method: "DELETE"
                    })
                    .then(() => window.location = window.location.href)
            })
        })
    </script>
</body>

</html>