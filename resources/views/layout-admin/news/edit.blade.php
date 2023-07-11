    
@extends('layout-admin.index')
@section('content')
 <!-- BEGIN: Content-->
     <!-- BEGIN: Content-->
     <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">News</h2>
                            <p style="color:green">
                                    <?php
                                        $message=Session::get('message');
                                        if($message !=NULL)
                                        {
                                            echo $message;
                                            Session::put('message','');
                                        }
                                    ?>
                             </p>
                        </div>
                    </div>
                </div>
                <div class="container">
            <h3>Edit News</h3>

            <section id="basic-horizontal-layouts">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Create News</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form form-horizontal" action="{{URL::to('update-news')}}" method="POST"  enctype="multipart/form-data">
                                    @csrf
                                            <div class="row">
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="first-name"> News Title</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                    <input type="text" value="{{$news_info->news_title}}" class="form-control" id="name" name="category_name" required placeholder="Category Name">
                                                      <input type="hidden" value="{{$news_info->id}}" class="form-control" id="name" name="id" required placeholder="Category Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="first-name"> Category</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                    <input type="text" value="{{$news_info->category_id}}" class="form-control" id="name" name="category_id" required placeholder="Category Name">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="first-name">News Short description</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                    <textarea name='news_short_description' class='form-control' >{{$news_info->news_short_description}}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="first-name">News description</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                    <textarea name='news_description' class='form-control' >{{$news_info->news_description}}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="first-name">NEWS MEDIA</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                    <div class="col-sm-9">
                                                         <input type="file" name="news_media">
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>           
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="first-name">Published</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                    <select class="form-control" id="published" name="publication_status" required placeholder="col-md-6">
                                                                      <option value="1">Yes</option>
                                                                        <option value="0">No</option>
                                                                    </select>
                                                             </div>
                                                        </div>
                                                  </div>

                                                  
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="first-name">Latest News</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                    <select class="form-control" id="published" name="latest_news" required placeholder="col-md-6">
                                                                      <option value="1">Yes</option>
                                                                        <option value="0">No</option>
                                                                    </select>
                                                             </div>
                                                        </div>
                                                  </div>

                                            <div class="col-sm-9 offset-sm-3">
                                                <button type="submit" class="btn btn-primary me-1">UPDATE</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

        </div>
    </div>
    <!-- END: Content-->

    <!-- END: Content-->

    @endsection