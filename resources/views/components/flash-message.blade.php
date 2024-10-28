@if (session('success'))
    <div class="bg-green-400 text-green-900 text-center">
        {{session('success')}}
    </div>
@elseif (session('info'))
    <div class="bg-yellow-400 text-orange-900 text-center">
        {{session('info')}}
    </div>
@endif