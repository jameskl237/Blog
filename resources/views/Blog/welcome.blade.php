@extends('Blog.base')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Blog /</span> Posts</h4>
        <div class="row">
            <!-- Examples -->
            @foreach ($arr as $value)
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $value->title }}</h5>
                            {{-- <h6 class="card-subtitle text-muted">Support card subtitle</h6> --}}
                        </div>
                        <img class="img-fluid" src="/blog/{{ $value->image }}" alt="image" />
                        <div class="card-body">
                            <p class="card-text">{{ $value->description }}</p>
                            <a href="javascript:void(0);" class="card-link">consulter</a>
                            <a href="javascript:void(0);" class="card-link">Commenter</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- / Content -->
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Nouveau post</h5>
                {{-- <small class="text-muted float-end">Merged input group</small> --}}
            </div>
            <div class="card-body">
                <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Titre</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="bx bx-text"></i></span>
                                <input type="text" class="form-control" name="title" id="basic-icon-default-fullname"
                                    placeholder="entrer le titre" aria-label="" required
                                    aria-describedby="basic-icon-default-fullname2" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="image">Image</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text">
                                    <i class="bx bx-image"></i></span>
                                <input type="file" class="form-control" name="image" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="basic-icon-default-message">Description</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-message2" class="input-group-text"><i
                                        class="bx bx-comment"></i></span>
                                <textarea id="basic-icon-default-message" class="form-control" placeholder="entrer la description" name="description"
                                    aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <a class="btn btn-danger" href="{{ route('home') }}">Fermer</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
