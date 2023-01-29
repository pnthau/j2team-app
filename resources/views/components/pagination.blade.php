@if ($paginator->hasPages())
<div class="row">
    <div class="col-sm-5">
        <div class="dataTables_info" id="datatables_info" role="status" aria-live="polite">
            {!! __('Showing') !!} {{ $paginator->firstItem()}}
            {!! __('to') !!} {{ $paginator->lastItem() }}
            {!!__('of') !!} {{ $paginator->total() }}
            entries</div>
    </div>
    <div class="col-sm-7">
        <div class="dataTables_paginate paging_full_numbers" id="datatables_paginate">
            <div class="d-flex justify-content-between flex-fill d-sm-none">
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                    <li class="paginate_button first disabled" id="datatables_first">
                        <a href="#">First</a>
                    </li>
                    <li class="paginate_button previous disabled" id="datatables_previous">
                        <a href="#">Previous</a>
                    </li>
                    @else
                    <li class="paginate_button first" id="datatables_first">
                        <a href="{{ url()->current() }}" aria-controls="datatables" data-dt-idx="0"
                            tabindex="0">First</a>
                    </li>
                    <li class="paginate_button previous" id="datatables_previous"><a
                            href="{{ $paginator->previousPageUrl() }}" aria-controls="datatables" data-dt-idx="1"
                            tabindex="0">Previous</a>
                    </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span>
                    </li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                    @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                    <li class="paginate_button active"><span class="page-link">{{ $page }}</span></li>
                    @else
                    <li class="paginate_button"><a aria-controls="datatables" data-dt-idx="3" tabindex="0"
                            href="{{ $url }}">{{
                            $page }}</a></li>
                    @endif
                    @endforeach
                    @endif
                    @endforeach


                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                    <li class="paginate_button next" id="datatables_next"><a href=" {{ $paginator->nextPageUrl() }}"
                            aria-controls="datatables" data-dt-idx="6" tabindex="0">Next</a>
                    </li>
                    <li class="paginate_button last" id="datatables_last"><a
                            href="{{ url()->current().'?page='.$paginator->lastPage() }}" aria-controls="datatables"
                            data-dt-idx="7" tabindex="0">Last</a>
                    </li>
                    @else
                    <li class="paginate_button disabled" id="datatables_next">
                        <a href="#">Next</a>
                    </li>
                    <li class="paginate_button last disabled" id="datatables_last">
                        <a href="#">Last</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
@endif