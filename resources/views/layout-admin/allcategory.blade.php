    
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
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="app-todo.html"><i class="me-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="me-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="me-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="me-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
          <!-- Dark Tables start -->
          <div class="row" id="dark-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Category</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-dark">
                                    <thead>
                                        <tr>   
                                             <th>ID </th>
                                            <th>Category name </th>
                                            <th>Category description</th>
                                            <th>Status</th>
                                            <th>publication_status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($allcategorys as $values)
                                        <tr>
                                        <td>{{$values->id}}</td>
                                            <td>{{$values->category_name}}</td>
                                            <td>{{$values->category_description}}</td>
                                            <td>{{$values->publication_status}}
                                          
                                            </td>
                                            <td>
                                                    @if($values->publication_status == 1)
                                              <a href="{{ route ('Category.publish', $values->id) }}"><button type="submit" class="btn btn-sm btn-success">publish</button></a>
                                                  @else
                                                  <a href="{{ route ('Category.unpublish', $values->id) }}"><button type="submit" class="btn btn-sm btn-danger">unpublish</button></a>
                                                   @endif
                                                    </td>
          
                                            <td>
                                            <a href="{{'edit-category/'.$values->id}}"><button type="button" class="btn btn-relief-success">Edit</button></a>
                                            <a href="{{'delete-category/'.$values->id}}"><button type="button" class="btn btn-relief-success">Delete</button></a>
                                            </td>
                                        </tr>
                                        <tr>
                                        @endforeach
                                  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Dark Tables end -->
        </div>
    </div>
    <!-- END: Content-->

    <!-- END: Content-->

    @endsection