@extends('theme.master')

@section('body')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card-box">
                <h4 style="text-align: center;">Papers</h4>

                <table id="datatable" class="table table-bordered dt-responsive nowrap">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($papers as $paper)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$paper->title}}</td>
                            <td>
                                <a href="{{route('edit', $paper->id)}}"><i class="fa fa-pencil-alt text-primary"></i></a>
                                <a href="#" onclick="return confirm('Are you to delete this office?')"><i class="fa fa-trash-alt text-danger ml-2"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection

