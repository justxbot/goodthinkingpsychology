@extends("layouts.admin")
@section('content')

<div class="message-container">

    <div class="message-header">

        <div class="message-name">
            <h1><i class="fa-solid fa-user"></i><span>{{ $message->fname." ".$message->lname }}</span></h1>
        </div>
        <div class="message-contact">
            <h1 onclick="window.open('tel:{{ $message->email }}')"><i class="fa-solid fa-envelope"></i></h1>
            <h1 onclick="window.open('tel:{{ $message->mobile }}')"><i class="fa-solid fa-phone"></i></h1>
        </div>
    </div>


    <div class="message-body">
        <div class="message-gesture">
            <p class="message-content">{{ $message->message }}</p>
        </div>
        <form action="/admin/message/destroy/{{ $message->id }}" method="post"class="message-footer">
            @csrf
            <button type="submit"><i class="fa-solid fa-trash"></i></button>

        </form>
    </div>





</div>


@endsection
