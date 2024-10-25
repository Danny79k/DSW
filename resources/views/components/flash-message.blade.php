@if (session('approved'))
    <div class="bg-green-400 text-green-900 text-center">
        {{session('approved')}}
    </div>
@elseif (session('notApproved'))
    <div class="bg-yellow-400 text-orange-900 text-center">
        {{session('notApproved')}}
    </div>
@endif