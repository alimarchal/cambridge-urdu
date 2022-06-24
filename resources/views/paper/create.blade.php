@extends('theme.master')
@section('body')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title">Paper</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title text-center">New Paper</h4>

                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <form action="{{route('create')}}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="title">Title</label>
                                        <div class="col-md-10">
                                            <input type="text" id="title" name="title" class="form-control" value="{{old('title')}}">
                                        </div>
                                    </div>
                                    <div class="form-group row float-right">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                </div> <!-- end card-box -->
            </div><!-- end col -->
        </div>
        <!-- end row -->
    </div>

@endsection

@section('scripts')
@endsection
