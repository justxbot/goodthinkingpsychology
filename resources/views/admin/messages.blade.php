@extends('layouts.admin')
@section('content')


<h1 class="section-title">All Messages</h1>
<div class="messages-container">
    @forelse ($messages as $message )
    <div class="message-bar">
        <div class="message-bar-left">
            <div class="message-name">
                <i class="fa-solid fa-user"></i><span>{{ $message->fname." ".$message->lname }}</span>
            </div>
            <div class="message-subject">
                <i class="fa-solid fa-circle-question"></i><span>{{ $message->subject }}</span>
            </div>
        </div>
        <div class="message-bar-right">

            <a href="/admin/messages/{{ $message->id }}" class="message-bar-button"><i class="fa-solid fa-eye"></i></a>

        </div>
    </div>

    @empty
    <div class="empty-section">
        <h1 >
            No pending appointments yet
        </h1>
      </div>
    @endforelse
</div>

@endsection
