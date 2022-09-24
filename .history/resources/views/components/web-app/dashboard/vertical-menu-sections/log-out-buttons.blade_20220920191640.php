{{-- logout buttom --}}
<form class="inline" action="/logout-user" method="post">
    @csrf
    <button type="submit" class="logout_btn color2-bg general-btn">Log Out <i class="fas fa-sign-out"></i></button>
</form>
{{-- logout buttom end--}}
