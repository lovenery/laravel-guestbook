@extends('layouts.app')

@section('content')

<div class="container">
	<div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                New Message
            </div>
            <!-- Bootstrap 樣板... -->

            <div class="panel-body">
                <!-- 顯示驗證錯誤 -->
                @include('common.errors')

                <!-- 新留言的表單 -->
                <form action="{{ url('message') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- 留言內容 -->
                    <div class="form-group">
                        <label for="message-name" class="col-sm-3 control-label">請輸入</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="message-name" class="form-control">
                        </div>
                    </div>

                    <!-- 增加留言按鈕-->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-plus"></i> 留言
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- 顯示目前留言 -->
        @if (count($messages) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current Messages
                </div>

                <div class="panel-body">
                    <table class="table table-striped message-table">

                        <!-- Table Headings -->
                        <thead>
                            <th>Content</th>
                            <th>&nbsp;</th>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                            @foreach ($messages as $message)
                                <tr>
                                    <!-- Message Name -->
                                    <td class="table-text">
                                        <a href="{{ url('messages/'.$message->id) }}"><div>{{ $message->name }}</div></a>
                                    </td>
                                    <!-- Delete Button -->
                                    <td>
                                        @if (Auth::user()->id==$message->user_id)
                                        <form action="{{ url('message/'.$message->id) }}" method="POST">
                                            {!! csrf_field() !!}
                                            {!! method_field('DELETE') !!}

                                            <button type="submit" id="delete-message-{{ $message->id }}" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
