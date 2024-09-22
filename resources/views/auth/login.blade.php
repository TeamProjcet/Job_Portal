<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link
            rel="icon"
            href="https://i.ibb.co.com/6w26Pc2/logo.jpg"
            type=""
    />
    <style>
        .position-relative {
            position: relative;
        }
        .field-icon {
            position: absolute;
            top: 75%;
            right: 15px;
            transform: translateY(-50%);
            cursor: pointer;
            z-index: 2;
        }
        .form-control {
            padding-right: 40px; /* Adjust based on the size of the icon */
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card p-4" style="width: 100%; max-width: 400px;">
        <div class="card-body">
            <h5 class="card-title text-center">Login Form</h5>
            <form action="{{url('/adlogin')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group position-relative">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember-me">
                    <label class="form-check-label" for="remember-me">Remember me</label>
                </div>
                <div class="text-center mt-3">
                    <a href="forgot .html" class="btn btn-link">Forgot password?</a>
                </div>
                <button type="submit" class="btn btn-success btn-block mt-3">Login</button>
                <div class="text-center mt-3">
                    Not a member? <a href="{{url('/register')}}" class="btn btn-link">Signup now</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Password visibility toggle script -->
<script>
    document.querySelectorAll('.toggle-password').forEach(icon => {
        icon.addEventListener('click', function () {
            const input = document.querySelector(this.getAttribute('toggle'));
            if (input.type === 'password') {
                input.type = 'text';
                this.classList.remove('fa-eye');
                this.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                this.classList.remove('fa-eye-slash');
                this.classList.add('fa-eye');
            }
        });
    });
</script>

</body>
</html>
