<div class="stats-tab">
    <div class="stats-tab-header">
        <div class="stats-icon-container">
            {{ $slot }}
        </div>
    </div>
    <div class="stats-tab-body">
        <h2>{{ $name }}</h2>
        <h4>{{ $number }}</h4>

    </div>
    <div class="stats-tab-footer">
        <button onclick="window.location.href ='{{ $url }}' ">SEE MORE</button>
    </div>

</div>
