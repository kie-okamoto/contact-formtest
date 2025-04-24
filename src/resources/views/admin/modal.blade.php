<table class="modal-table">
  <tr>
    <th>お名前</th>
    <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
  </tr>
  <tr>
    <th>性別</th>
    <td>{{ ['1' => '男性', '2' => '女性', '3' => 'その他'][$contact->gender] }}</td>
  </tr>
  <tr>
    <th>メール</th>
    <td>{{ $contact->email }}</td>
  </tr>
  <tr>
    <th>電話</th>
    <td>{{ $contact->tel }}</td>
  </tr>
  <tr>
    <th>住所</th>
    <td>{{ preg_replace('/〒\d{3}-\d{4}\s*/', '', $contact->address) }}</td>
  </tr>
  <tr>
    <th>建物名</th>
    <td>{{ $contact->building ?? '―' }}</td>
  </tr>
  <tr>
    <th>お問い合わせ種類</th>
    <td>{{ $contact->category->content ?? '―' }}</td>
  </tr>
  <tr>
    <th>お問い合わせ内容</th>
    <td class="content-text">{!! nl2br(e($contact->detail)) !!}</td>
  </tr>
</table>

{{-- 削除ボタン --}}
<form method="POST" action="{{ route('admin.delete', ['id' => $contact->id]) }}" class="form__button">
  @csrf
  @method('DELETE')
  <button type="submit" class="delete-btn">削除</button>
</form>