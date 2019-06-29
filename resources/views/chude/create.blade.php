<form method="post" action="{{ route('chude.store') }}">
    {{ csrf_field() }}
    Tên <input type="text" name="cd_ten" placeholder="Nhập tên" />
    <button>Lưu</button>
</form>