@extends('admin.app')

@section('content')
    <div id="main-content">
        <section class="wrapper">
            <h2 class="text-center mb-2 text-info">
                Profile
            </h2><br>
            <div class="main-body">
                <div class="row gutters-sm">
                    <div class="col-md-3 ">
                        <div class="card">
                            <div class="card-body background">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="{{ asset('images/' . Auth::guard('admin')->user()->image) }}" alt="user"
                                        class="rounded-circle image-previewer" height="150px" width="150">
                                    <div class="mt-3">
                                        <h4>{{ Auth::guard('admin')->user()->name }}</h4>
                                        <div class="col-lg-6">
                                            <input class="custom-file-input" type="file" name="image" id="file">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{ Route('admin.update-profile') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="col-md-9">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Full Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input class="form-control-plaintext" id="name" name="name" type="text"
                                                @error('name') is-invalid @enderror
                                                value="{{ Auth::guard('admin')->user()->name }}" required>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input class="form-control-plaintext" id="email" name="email" type="text"
                                                @error('email') is-invalid @enderror
                                                value="{{ Auth::guard('admin')->user()->email }}" required>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Phone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input class="form-control-plaintext" id="phone" name="phone" type="number"
                                                value="{{ Auth::guard('admin')->user()->phone }}">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Gender</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{-- {!! getSexUserText(Auth::user()->gender) !!} --}}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Address</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input class="form-control-plaintext " id="address" name="address" type="text"
                                                value="{{ Auth::guard('admin')->user()->address }}">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button class="btn btn-primary" type="submit">save changes</button>
                                            <a class="btn btn-default" href="{{ Route('admin.index') }}">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    </section>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/ijaboCropTool.min.js') }}"></script>
    <script>
        $('#file').ijaboCropTool({
            preview: '.image-previewer',
            setRatio: 1,
            allowedExtensions: ['jpg', 'jpeg', 'png'],
            buttonsText: ['CROP', 'QUIT'],
            buttonsColor: ['#30bf7d', '#ee5155', -15],
            processUrl: '{{ Route('admin.crop2') }}',
            withCSRF: ['_token', '{{ csrf_token() }}'],
            onError: function(message, element, status) {
                alert(message);
            }
        });
    </script>
@endsection

<style>
    .card {
        box-shadow: 0 2px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    }
    .image-previewer {
        border-radius: 50%;
    }
    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(58, 58, 58, 0.125);
        border-radius: .25rem;
    }
    .background {
        background: rgb(244, 241, 241);
    }

    .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 3rem;
    }

    .gutters-sm {
        margin-right: -8px;
        margin-left: -8px;
    }

    .gutters-sm>.col,
    .gutters-sm>[class*=col-] {
        padding-right: 8px;
        padding-left: 8px;
    }

    .mb-3,
    .my-3 {
        margin-bottom: 1rem !important;
    }

    .bg-gray-300 {
        background-color: #e2e8f0;
    }

    .shadow-none {
        box-shadow: none !important;
    }
</style>
