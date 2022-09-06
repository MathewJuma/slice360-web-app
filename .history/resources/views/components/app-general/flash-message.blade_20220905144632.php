{{-- @if (session()->has('message')) --}}
    <div x-data="{flush_message: true}" x-init="setTimeout(() => flush_message = false, 3000)" x-show="flush_message" class="add-list color-bg" id="fixed-flash-box">
        <p>{{ session('message') }}</p>
    </div>
{{-- @endif --}}

{{-- this is for custon JQuery notifications --}}
<div class="jquery_nofications"></div>
{{-- this is for custon JQuery notifications end --}}
