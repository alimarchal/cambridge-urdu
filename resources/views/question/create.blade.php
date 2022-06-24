@extends('theme.master')
@section('body')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title">Question</h4>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title text-center">New Question</h4>
                    @if($errors)
                        <ul class="parsley-errors-list filled" aria-hidden="false">
                            @foreach ($errors->all() as $error) <li  style="color: red">{{ $error }}</li> @endforeach</ul>
                    @endif

                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <form action="{{route('question.create')}}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="papers">Papers</label>
                                        <div class="col-md-10">
                                            <select name="papers[]" id="papers" class="select2 select2-multiple" multiple="multiple" data-placeholder="Select">
                                                @foreach($papers as $paper)
                                                    <option value="{{$paper->id}}">{{$paper->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="question">Question</label>
                                        <div class="col-md-10">
                                            <input type="text" id="question" name="question" class="form-control" value="{{old('question')}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="right_option">Right option</label>
                                        <div class="col-md-10">
                                            <input type="text" id="right_option" name="right_option" class="form-control" value="{{old('right_option')}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="wrong_option_1">Wrong option 1</label>
                                        <div class="col-md-10">
                                            <input type="text" id="wrong_option_1" name="wrong_option_1" class="form-control" value="{{old('wrong_option_1')}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="wrong_option_2">Wrong option 2</label>
                                        <div class="col-md-10">
                                            <input type="text" id="wrong_option_2" name="wrong_option_2" class="form-control" value="{{old('wrong_option_2')}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="wrong_option_3">Wrong option 3</label>
                                        <div class="col-md-10">
                                            <input type="text" id="wrong_option_3" name="wrong_option_3" class="form-control" value="{{old('wrong_option_3')}}">
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
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection
