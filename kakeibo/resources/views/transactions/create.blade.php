<x-layout>
    <h2>取引を追加</h2>

    <form method="POST" action="{{ route('transactions.store') }}">
        @csrf

        <p>
            <label>日付
                <input type="date" name="occurred_at" value="{{ old('occurred_at') }}">
            </label>
            @error('occurred_at') <span class="error">{{ $message }}</span> @enderror
        </p>

        <p>
            <label>区分
                <select name="type">
                    <option value="expense" @selected(old('type', 'expense') === 'expense')>支出</option>
                    <option value="income" @selected(old('type') === 'income')>収入</option>
                </select>
            </label>
            @error('type') <span class="error">{{ $message }}</span> @enderror
        </p>

        <p>
            <label>カテゴリ
                <select name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </label>
            @error('category_id') <span class="error">{{ $message }}</span> @enderror
        </p>

        <p>
            <label>金額（円）
                <input type="number" name="amount" value="{{ old('amount') }}">
            </label>
            @error('amount') <span class="error">{{ $message }}</span> @enderror
        </p>

        <p>
            <label>メモ（任意）
                <input type="text" name="note" value="{{ old('note') }}">
            </label>
            @error('note') <span class="error">{{ $message }}</span> @enderror
        </p>

        <p><button type="submit">登録する</button></p>
    </form>
</x-layout>
