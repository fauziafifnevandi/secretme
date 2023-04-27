<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/home/style.css')}}">
    <link rel="shortcut icon" href="https://secreto.site/images/bond_small.png" type="image/png">
    <title>Secretme</title>
</head>
<body>
    <div class="custom-container">
        <div class="main-header">
            <div class="d-flex justify-content-center">
                <img src="https://secreto.site/images/bond_small.png?v=8" class="me-1" alt="" >
                <h5 class="bold ms-1">Secretme</h5>
            </div>
        </div>
        <div class="main-container">
            <div class="register-box">
                <div class="d-flex justify-content-center">
                    <h5 class="center">Secret Message Book</h5>
                </div>
                <ul>
                    <li>Get anonymous feedback from your Friends & Coworkers.</li>
                    <li>Improve your Friendship by discovering your Strengths and areas for Improvement</li>
                </ul>
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Your Name">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary mt-3 ms-2 me-2">Submit</button>
                    </div>
                </form>
            </div>
            <div class="message-box">
                <h4 class="text-center mt-3">Secret Message Boook</h4>
                <ul>
                    <li>Get anonymous feedback from your Friends & Coworkers.</li>
                    <li>Improve your Friendship by discovering your Strengths and areas for Improvement</li>
                </ul>
            </div>
        </div>
        <div class="footer">
            <div class="footer-link">
                <ul class="footer-link-top">
                    <li>
                        <a href="">Contact</a>
                    </li>
                    <li>
                        <div class="d-flex justify-content-center mt-2">
                            <a href="" class="ms-3">Apps</a>
                            <a href="" class="ms-3">Privacy</a>
                            <a href="" class="ms-3">Policy</a>
                        </div>
                    </li>
                </ul>
                <div class="social-icon">
                    <ul>
                        <li>
                            <div class="d-flex justify-content-center mt-2">
                                <a href="">
                                    <img src="https://secreto.site/secretonew/images/whatsapp-1.svg" alt="">
                                </a>
                                <a href="" class="ms-3">
                                    <img src="https://secreto.site/secretonew/images/facebook-1.svg" alt="">
                                </a>
                                <a href="" class="ms-3">
                                    <img src="https://secreto.site/secretonew/images/instagram-1.svg" alt="">
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>