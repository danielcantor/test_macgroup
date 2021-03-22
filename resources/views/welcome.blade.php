<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="{{url("/css/app.css")}}"  rel="stylesheet">
        <!-- Fonts -->
    </head>
    <body>
        <div id="app" class="container mt-3">
            <div class="row">
                <Editar class="col-4" v-bind:id="id" v-bind:content="content" v-bind:title="title" v-bind:mode="mode"></Editar>
                <Lista class="col-8" ref="List"></Lista>
            </div>
            
        </div>
    <script src="{{url("/js/app.js")}}"></script>
    </body>
</html>
