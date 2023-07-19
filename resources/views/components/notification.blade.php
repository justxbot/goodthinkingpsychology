    @php
        $uniqueVar = "dd".uniqid();
    @endphp
<div class="notification {{ $uniqueVar }} {{ $class }}">
    <p class="notification-body">{{ $text }}</p>
</div>
<script>
    let notification{{ $uniqueVar }} = document.querySelector(".{{$uniqueVar}}")
    setTimeout(() => {
            notification{{ $uniqueVar }}.remove();
    }, {{ $delay }});
</script>
