<!DOCTYPE html> 

<html> 

<head> 

    <title>Laravel 8 Contact Form Example - NiceSnippets.com</title> 

    <meta charset="utf-8"> 

    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 

    <meta name="viewport" content="width=device-width, initial-scale=1"> 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" target="_blank" rel="nofollow"  integrity="sha512-MoRNloxbStBcD8z3M/2BmnT+rg4IsMxPkXaGh2zD6LGNNFE80W3onsAhRcMAMrSoyWL9xD7Ert0men7vR8LUZg==" crossorigin="anonymous" /> 

</head> 

<body> 

    <div class="container"> 

        <div class="row mt-5 mb-5"> 

            <div class="col-8 offset-2 mt-5"> 

                <div class="card"> 

                    <div class="card-header bg-info"> 

                        <h3 class="text-white">Laravel 8 Contact Form Example - NiceSnippets.com</h3> 

                    </div> 

                    <div class="card-body"> 

                         

                        @if(Session::has('success')) 

                        <div class="alert alert-success"> 

                            {{ Session::get('success') }} 

                            @php 

                                Session::forget('success'); 

                            @endphp 

                        </div> 

                        @endif 

                    

                        <form method="POST" action="{{ route('contact-form.store') }}"> 

                   

                            {{ csrf_field() }} 

                            <div class="row"> 

                                <div class="col-md-6"> 

                                    <div class="form-group"> 

                                        <strong>Name:</strong> 

                                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}"> 

                                        @if ($errors->has('name')) 

                                            <span class="text-danger">{{ $errors->first('name') }}</span> 

                                        @endif 

                                    </div> 

                                </div> 

                                <div class="col-md-6"> 

                                    <div class="form-group"> 

                                        <strong>Email:</strong> 

                                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}"> 

                                        @if ($errors->has('email')) 

                                            <span class="text-danger">{{ $errors->first('email') }}</span> 

                                        @endif 

                                    </div> 

                                </div> 

                            </div> 

                            <div class="row"> 

                                <div class="col-md-6"> 

                                    <div class="form-group"> 

                                        <strong>Phone:</strong> 

                                        <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ old('phone') }}"> 

                                        @if ($errors->has('phone')) 

                                            <span class="text-danger">{{ $errors->first('phone') }}</span> 

                                        @endif 

                                    </div> 

                                </div> 

                                <div class="col-md-6"> 

                                    <div class="form-group"> 

                                        <strong>Subject:</strong> 

                                        <input type="text" name="subject" class="form-control" placeholder="Subject" value="{{ old('subject') }}"> 

                                        @if ($errors->has('subject')) 

                                            <span class="text-danger">{{ $errors->first('subject') }}</span> 

                                        @endif 

                                    </div> 

                                </div> 

                            </div> 

                            <div class="row"> 

                                <div class="col-md-12"> 

                                    <div class="form-group"> 

                                        <strong>Message:</strong> 

                                        <textarea name="message" rows="3" class="form-control">{{ old('message') }}</textarea> 

                                        @if ($errors->has('message')) 

                                            <span class="text-danger">{{ $errors->first('message') }}</span> 

                                        @endif 

                                    </div>   

                                </div> 

                            </div> 

                    

                            <div class="form-group text-center"> 

                                <button class="btn btn-success btn-submit">Save</button> 

                            </div> 

                        </form> 

                    </div> 

                </div> 

            </div> 

        </div> 

    </div> 

</body> 

</html> 