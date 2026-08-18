<x-layout>
    <h2>取引を編集</h2>

    <form method="POST" action="{{ route('transactions.update', $transaction) }}">
        @csrf
        @method('PUT')

        <p>
            <label>日付
                <input type="date" name="occurred_at" value="{{ old('occurred_at', $transaction->occurred_at) }}">
            </label>
            @error('occurred_at') <span class="error">{{ $message }}</span> @enderror
        </p>

        <p>
            <label>区分
                <select name="type">
                    <option value="expense" @selected(old('type', $transaction->type) === 'expense')>支出</option>
                    <option value="income" @selected(old('type', $transaction->type) === 'income')>収入</option>
                </select>
            </label>
            @error('type') <span class="error">{{ $message }}</span> @enderror
        </p>

        <p>
            <label>カテゴリ
                <select name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id', $transaction->category_id) == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </label>
            @error('category_id') <span class="error">{{ $message }}</span> @enderror
        </p>

        <p>
            <label>金額（円）
                <input type="number" name="amount" value="{{ old('amount', $transaction->amount) }}">
            </label>
            @error('amount') <span class="error">{{ $message }}</span> @enderror
        </p>

        <p>
            <label>メモ（任意）
                <input type="text" name="note" value="{{ old('note', $transaction->note) }}">
            </label>
            @error('note') <span class="error">{{ $message }}</span> @enderror
        </p>

        <p><button type="submit">更新する</button></p>
    </form>
</x-layout>
