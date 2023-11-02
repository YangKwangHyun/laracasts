<x-guest-layout>

    <div class="container">
        <div class="flex justify-center">
            <span class="text-2xl font-bold bg-blue-300 rounded-md p-2">인보이스 상세 정보</span>
        </div>

        {{-- 인보이스 정보가 있는 경우 내용을 보여줍니다 --}}
        @if($invoice)
            <div class="card">
                <div class="card-header">
                    인보이스 번호: {{ $invoice->id }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">상세 정보</h5>
                    <p class="card-text">총액: {{ $invoice->total }}</p>
                    <p class="card-text">날짜: {{ $invoice->charge_date }}</p>
                    <p class="card-text">상태: {{ $invoice->paid }}</p>
                </div>
            </div>
        @else
            <p>해당 인보이스를 찾을 수 없습니다.</p>
        @endif
    </div>
</x-guest-layout>
