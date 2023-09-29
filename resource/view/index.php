<!DOCTYPE html>
<html lang="en">
<?php include __DIR__ . "/../../resource/view/_include/head.php"; ?>

<body class="mt-3">
    <div class="container">
        <form method="post" action="/user" class="form-send">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" required name="name" class="form-control " id="name">
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Surname</label>
                <input type="text" required name="surname" class="form-control" id="surname">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" required name="email" class="form-control" id="email">

            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" required name="password" class="form-control" id="password">
            </div>

            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="password" required name="confirmPassword" class="form-control" id="confirmPassword">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="alert alert-danger mt-3 d-none" id="error">

        </div>
        <div class="mt-3" id="user">
            <table class="table d-none">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">Surname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>

    </div>
    <script src="/../../resource/js/index.js"></script>
</body>

</html>