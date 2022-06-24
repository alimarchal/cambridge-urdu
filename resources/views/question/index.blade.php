@extends('theme.master')

@section('body')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card-box">
                <h4 style="text-align: center;">Questions</h4>

                <table id="datatable" class="table table-bordered dt-responsive nowrap">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Question</th>
                        <th>Assigned Papers to</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($questions as $question)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$question->question}}</td>
                            <td>
                                @foreach($question->papers as $paper)
                                    {{$paper->paper->title}} @if(!$loop->last), @endif
                                @endforeach
                            </td>
                            <td>
                                <a href="{{route('question.edit', $question->id)}}"><i class="fa fa-pencil-alt text-primary"></i></a>
                                <a href="{{route('question.delete', $question->id)}}" onclick="return confirm('Are you to delete this office?')"><i class="fa fa-trash-alt text-danger ml-2"></i></a>
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

