@extends('layouts.app')
@section('content')

@include('inc.nav')
<div class="container">
<h2>Territories</h2>
<p>Here are the list of territories</p>
<ul id="myUL">
    @foreach($hierarchicalData[null] as $region)
    <li>
        @if(isset($hierarchicalData[$region['id']]))
        <span class="caret">{{ $region['name'] }}</span>
        <ul class="nested">
            @foreach($hierarchicalData[$region['id']] as $city)
            <li>
                @if(isset($hierarchicalData[$city['id']]))
                <span class="caret">{{ $city['name'] }}</span>
                <ul class="nested">
                    @foreach($hierarchicalData[$city['id']] as $barangay)
                    <li>{{ $barangay['name'] }}</li>
                    @endforeach
                </ul>
                @else
                {{ $city['name'] }}
                @endif
            </li>
            @endforeach
        </ul>
        @else
        {{ $region['name'] }}
        @endif
    </li>
    @endforeach
</ul>
</div>
<script>
    var toggler = document.getElementsByClassName("caret");
    var i;
    for (i = 0; i < toggler.length; i++) {
        toggler[i].addEventListener("click", function() {
            this.parentElement.querySelector(".nested").classList.toggle("active");
            this.classList.toggle("caret-down");
        });
    }
</script>
@endsection