    
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
                            <h2 class="content-header-title float-start mb-0">Category</h2>
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
    <h3>Edit Category</h3>

            <section id="basic-horizontal-layouts">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Create Category</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form form-horizontal" action="{{URL::to('update-category')}}" method="POST" >
                                    @csrf
                                            <div class="row">
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="first-name">Category Name</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                    <input type="text" value="{{$category_info->category_name}}" class="form-control" id="name" name="category_name" required placeholder="Category Name">
                                                      <input type="hidden" value="{{$category_info->id}}" class="form-control" id="name" name="id" required placeholder="Category Name">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="first-name">Category description</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                    <textarea name='category_description' class='form-control' >{{$category_info->category_description}}</textarea>
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