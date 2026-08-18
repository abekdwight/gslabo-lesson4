<x-layout>
    <table>
        <thead>
            <tr>
                <th>日付</th>
                <th>カテゴリ</th>
                <th>区分</th>
                <th class="amount">金額</th>
                <th>メモ</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->occurred_at }}</td>
                    <td>{{ $transaction->category->name }}</td>
                    <td>{{ $transaction->type === 'income' ? '収入' : '支出' }}</td>
                    <td class="amount">¥{{ number_format($transaction->amount) }}</td>
                    <td>{{ $transaction->note }}</td>
                    <td>
                        <a href="{{ route('transactions.edit', $transaction) }}">編集</a>
                        <form method="POST" action="{{ route('transactions.destroy', $transaction) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
