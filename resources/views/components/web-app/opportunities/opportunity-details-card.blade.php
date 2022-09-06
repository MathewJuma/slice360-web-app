@props(['title', 'reviewCount'])

@php
    $review_count = !empty($reviewCount) && $reviewCount != '' ? '<span> - '.$reviewCount.'</span>' : '';
@endphp

<div {{ $attributes->merge(["class"=>"list-single-main-item fl-wrap block_box", "id"=>""]) }} >
    <div class="list-single-main-item-title">
        <h3>{{ $title }} {!! $review_count !!}</h3>
    </div>
    {{ $slot }}
</div>
