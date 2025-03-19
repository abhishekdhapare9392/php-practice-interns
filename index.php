<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    /* Centering the table */
    .table-container {
        width: 60%;
        margin: 50px auto;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
        background-color: white;
        padding: 20px;
    }

    .fa-pen {
        color: #007bff;
        cursor: pointer;
        transition: 0.2s;
    }

    .fa-pen:hover {
        color: #0056b3;
        transform: scale(1.1);
    }

    .fa-trash {
        color: rgb(241, 76, 58);
        cursor: pointer;
        transition: 0.2s;
    }

    .fa-trash:hover {
        color: rgb(255, 139, 139);
        transform: scale(1.1);
    }

    #successMessage {
        display: none;
    }

    .login-card {
        display: none;
    }
    </style>
</head>

<body>

    <div class="container">
        <div class="fs-1 text-center mt-5">
            <h1>Registered Users</h1>
        </div>
        <span id="successMessage" class="text-danger message"></span>
        <div class="table-container">
            <div class="d-flex justify-content-end my-3">
                <button type="button" class="btn btn-primary" onclick="addUser()">Add User</button>
            </div>
            <div class="my-3">
                <div class="login-card">
                    <h2 class="mb-4">User Login</h2>

                    <form>
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input class="form-control" type="text" id="first_name" name="first_name"
                                placeholder="First Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input class="form-control" type="text" id="last_name" name="last_name"
                                placeholder="Last Name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control" type="email" id="email" name="email" placeholder="Email"
                                required>
                        </div>
                        <button type="button" class="btn btn-warning" onclick="cancelLoginForm()">cancel</button>
                        <button type="button" class="btn btn-primary" onclick="saveUser()">Save</button>
                    </form>
                </div>
            </div>
            <table class="table table-striped table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                        <th>EMAIL</th>
                        <th>Edit Info</th>
                    </tr>
                </thead>
                <tbody id="users-table-body">

                </tbody>
            </table>
        </div>


    </div>

    <!-- <script>
    // Adding event listener for all edit buttons
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default redirect
            let userId = this.getAttribute('data-id'); // Get user ID
            if (confirm("Do you want to edit this user?")) {
                window.location.href = 'edit.php ?id=' + userId; // Redirect to edit page
            }
        });
    });
    </script> -->

    <script>
    function getUsers() {
        fetch('/get.php')
            .then(response => response.json())
            .then(data => {
                console.log(data)
                let tbody = document.getElementById('users-table-body');
                tbody.innerHTML = '';
                data.forEach(item => {
                    let tr = `
                    <tr>
                        <td>${item.first_name}</td>
                        <td>${item.last_name}</td>
                        <td>${item.email}</td>
                        <td>
                            <a href="edit.php?id=${item.id}" class="edit-btn" data-id="${item.id}"><i class="fa fa-pen"></i></a>
                            <a href="delete.php?id=${item.id}" class="delete-btn" data-id="${item.id}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    `;
                    tbody.innerHTML += tr;
                })
            })
    }
    document.addEventListener("DOMContentLoaded", function() {
        // console.log("working");
        getUsers();
    })



    function addUser() {
        document.querySelector('.login-card').style.display = 'block';
    }

    function cancelLoginForm() {
        document.querySelector('.login-card').style.display = 'none';
    }

    function saveUser() {
        let firstName = document.getElementById('first_name').value;
        let lastName = document.getElementById('last_name').value;
        let email = document.getElementById('email').value;
        let data = new FormData();
        data.append('first_name', firstName);
        data.append('last_name', lastName);
        data.append('email', email);
        fetch('/add.php', {
                method: 'POST',
                body: data,
            }).then(response => response.json())
            .then(data => {
                // console.log(data);
                document.getElementById('first_name').value = '';
                document.getElementById('last_name').value = '';
                document.getElementById('email').value = '';
                document.querySelector('.login-card').style.display = 'none';
                document.getElementById('successMessage').style.display = 'block';
                document.getElementById('successMessage').innerHTML = 'User added successfully';
                setTimeout(() => {
                    document.getElementById('successMessage').style.display = 'none';
                }, 5000);
                getUsers();
            }).catch(error => {
                console.error(error);
            });
    }
    </script>

</body>

</html>