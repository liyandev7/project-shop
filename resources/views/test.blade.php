<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @php
        $fonts = \App\Font::all();
$options=\App\Option::all();

    @endphp

    @foreach ($fonts as $font)
        {!! $font->cdn !!}
    @endforeach
</head>

<body>


<h1 class="element">
    Hello World !
</h1>
@foreach ($fonts as $font)
    <input value={{ $font->name }} class="select-font" type="radio" name="font"
           data-name="{{ $font->name }}"> {{ $font->name }}
@endforeach

<p id="money">
    250000
</p>

@foreach($options as $option)
    <input type="checkbox" name="{{$option->id}}">{{$option->name}}
@endforeach


<script src="{{asset('/js/app.js')}}"></script>

<script>

    const fontsElement = document.querySelectorAll(".select-font");
    const elementFont = document.querySelector(".element");

    fontsElement.forEach((font) => {
        font.addEventListener('click', (e) => {
            let fontName = e.target.value;

            elementFont.style.fontFamily = `${fontName}`;
        })
    })

    let money=parseInt(document.querySelector("#money").innerHTML);






</script>

</body>

</html>
