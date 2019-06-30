<form method="post" action="{{ route('chude.update', ['id' => $chude->cd_ma]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    Tên <input type="text" name="cd_ten" placeholder="Nhập tên" value="{{  $chude->cd_ten }}" />
    <button>Lưu</button>
</form>