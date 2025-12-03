<div {{$attributes->merge(['class' => 'card-body p-5'])}} id="overlay">
    <div class="fv-row row fv-plugins-icon-container">
        {{$slot}}
    </div>
    <div id="data"></div>
</div>

