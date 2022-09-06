@if ($paginator->hasPages())
    <div class="row pagination fwmpag" style="border: 0px solid pink;">

        <div class="col-md-12">
            <div class="row" style="border: 0px solid red;">
                <div class="col-md-12" style="margin-right: 0px !important; border: 0px solid red;">
                    <div style="float: center !important;">

                        {{-- Previous Page Link --}}
                        @if ($paginator->onFirstPage())
                            <a href="#" class="prevposts-link disabled" aria-disabled="true">
                                <i class="fas fa-caret-left"></i><span>Prev</span>
                            </a>
                        @else
                            <a href="{{ $paginator->previousPageUrl() }}" class="prevposts-link">
                                <i class="fas fa-caret-left"></i><span>Prev</span>
                            </a>
                        @endif
                        {{-- Previous Page Link End--}}

                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)

                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <a href="#" style="color:#4db7fe !important;">{{ $element }}</a>
                            @endif
                            {{-- "Three Dots" Separator End--}}

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <a href="#" class="current-page">{{ $page }}</a>
                                    @else
                                        <a href="{{ $url }}">{{ $page }}</a>
                                    @endif
                                @endforeach
                            @endif
                            {{-- Array Of Links End --}}
                        @endforeach
                        {{-- Pagination Elements End --}}

                        {{-- Next Page Link --}}
                        @if ($paginator->hasMorePages())
                            <a href="{{ $paginator->nextPageUrl() }}" class="nextposts-link">
                                <span>Next</span><i class="fas fa-caret-right"></i>
                            </a>
                        @else
                            <a href="#" class="nextposts-link disabled" aria-disabled="true">
                                <span>Next</span><i class="fas fa-caret-right"></i>
                            </a>
                        @endif
                        {{-- Next Page Link End --}}

                    </div>
                </div>
                <div class="col-md-12" style="margin-right: 0px !important; border: 0px solid red;">
                    <div style="float: center !important;">
                        <div class="text-muted" style="font-family: Poppins-Light !important; font-size: 14px !important; padding-top: 15px !important; color: #4db7fe !important; letter-spacing: 0.15rem !important;">
                            {!! __('Showing') !!}
                            <span class="fw-semibold"><b>{{ $paginator->firstItem() }}</b></span>
                            {!! __('to') !!}
                            <span class="fw-semibold"><b>{{ $paginator->lastItem() }}</b></span>
                            {!! __('of') !!}
                            <span class="fw-semibold"><b>{{ $paginator->total() }}</b></span>
                            {!! __('results') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endif


