<x-guest-layout>

    <div class="container">
        <div class="flex justify-center">
            <span class="text-2xl font-bold bg-blue-300 rounded-md p-2">인보이스 상세 정보</span>
        </div>

        {{-- 인보이스 정보가 있는 경우 내용을 보여줍니다 --}}
        @if($invoice)
            <div class="card">
                <div class="card-header">
                    인보이스 번호: {{ $invoice->number }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">상세 정보</h5>
                    <p class="card-text">상태: {{ $invoice->status }}</p>
                    <p class="card-text">통화: {{ $invoice->currency }}</p>
                    <p class="card-text">총액: {{ $invoice->total }}</p>
                    <p class="card-text">소계: {{ $invoice->subtotal }}</p>
                    <p class="card-text">세금: {{ $invoice->tax }}</p>
                    <p class="card-text">세금 비율: {{ $invoice->tax_percent }}%</p>
                    <p class="card-text">시작 잔액: {{ $invoice->starting_balance }}</p>
                    <p class="card-text">종료 잔액: {{ $invoice->ending_balance }}</p>
                    <p class="card-text">생성일: {{ $invoice->created_at->toDateString() }}</p>
                </div>
            </div>
        @else
            <p>해당 인보이스를 찾을 수 없습니다.</p>
        @endif
    </div>
</x-guest-layout>
