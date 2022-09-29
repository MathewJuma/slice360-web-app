@php

    //set inital values
    $title = $post->title;

@endphp

{{-- load the main web-app layout --}}
<x-app-general.main-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories' :user_details='[]'>

    <!--component :: slice360 blog :: hero inner -->
    <x-app-general.hero-inner title='title' :description='$title' imageName='about-us.jpg'/>
    <!--component end :: slice360 blog :: hero inner-->



</x-app-general.main-web-app-layout>
{{-- load the main web-app layout end --}}
