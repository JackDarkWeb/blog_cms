

    <label>@if(!$translation) {{ __("Translation To language") }} @else {{ __("Update Language Here") }} @endif</label>


    <div class="btn-group btn-group-toggle" data-toggle="buttons">

        @foreach(app_languages()->pluck("iso_code") as $lang)
            <label class="btn @if($to_lang === $lang )bg-olive active @endif" onclick="event.preventDefault();  document.getElementById({{ "\"{$lang}\"" }}).click();">
                <input type="radio" name="origin_lang" @if($to_lang === $lang) checked @endif id="option1" autocomplete="off" value="{{ $lang }}">
                {{ \Illuminate\Support\Str::upper($lang) }}
            </label>
        @endforeach

    </div>

    @foreach(app_languages()->pluck("iso_code") as $lang)
        <a href="{{ route("translation.$model", ["lang" => app()->getLocale(), "$model" => ${$model}->id, "to_lang" => $lang]) }}" id="{{ $lang }}" class="d-none"></a>
    @endforeach




