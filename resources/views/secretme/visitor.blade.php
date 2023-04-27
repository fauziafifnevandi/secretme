<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/visitor/style.css')}}">
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
                    <h5 class="center">Send Secret Message To</h5>
                </div>
                <div class="d-flex justify-content-center">
                    <h5 class="fw-bold">{{ ucfirst($username) }}</h5>
                </div>
                <ul>
                    <li>{{ ucfirst($username) }} will never know who sent this message</li>
                </ul>
                <form action="{{ route('messages.store', ['generate_link' => $generate_link]) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <textarea name="message" id="" cols="20" rows="4" class="form-control" placeholder="Write Secret Message"></textarea>
                            </div>
                            @error('message')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary mt-3 ms-2 me-2">Submit</button>
                    </div>
                </form>
            </div>
            <div class="message-block">
                @if ($message_success = Session::get('message_success'))
                    <div id="success-alert" class="alert alert-success">
                        <p>{{ $message_success }}</p>
                    </div>
                @endif
                <p class="title">
                    Timeline of 
                    <strong>{{ ucfirst($username) }}</strong>
                </p>
                <div class="d-flex justify-content-center">
                    {{ $messages->links() }}
                </div>
                @if ($comment_success = Session::get('comment_success'))
                <div id="success-alert" class="alert alert-success">
                    <p>{{ $comment_success }}</p>
                </div>
            @endif
                @foreach ($messages as $message)
                <div class="message-child-block">
                    <div class="main-message-box mb-2">
                        <div class="message-title">
                            <div class="row">
                                <div class="col-10">
                                    <p class="fw-bold">
                                        View Details
                                    </p>
                                </div>
                                {{-- <div class="col-2">
                                    <div class="d-flex justify-content-end">
                                        <form action="{{ route('messages.destroy',$message->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-close small" aria-label="Close"></button>
                                        </form>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <h6 class="message-text mb-4">{{ $message->message }}</h6>
                        <div class="form-send-message">
                            <form action="{{ route('comments.store',$message->id) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-10 col-md-10 col-sm-10 mt-1" style="padding-right: 0px">
                                        <div class="form-group">
                                            <textarea name="comment" id="" cols="5" rows="1" class="form-control" placeholder="Write Secret Message"></textarea>
                                        </div>   
                                    </div>
                                    <div class="col-2 col-md-2 col-sm-2">
                                        <div class="mt-1 d-flex justify-content-end">
                                            <button class="btn btn-outline-secondary" type="submit">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </form>       
                        </div>
                        @foreach ($message->comments as $comment)
                            <div class="comments">
                                <p>{{ $comment->comment }}</p>
                                {{-- <div class="position-absolute top-0 end-0 me-1 mt-1">
                                    <form action="{{ route('comments.destroy',$comment->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-close small" aria-label="Close"></button>
                                    </form>
                                </div> --}}
                            </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        setTimeout(function() {
            $('#success-alert').fadeOut('fast');
        }, 3000); // waktu tampilan sebelum pesan dihapus (dalam milidetik)
    </script>
</body>
</html>