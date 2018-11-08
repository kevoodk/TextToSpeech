<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.4.5/p5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.4.5/addons/p5.dom.js"></script>
<script src="{{ URL::asset('js/lib/p5.speech.js') }}"></script>
<script>

var words = ["i", "heart", "p", "five"]; // some words
var iptr = 0; // a counter for the words

var myVoice = new p5.Speech(); // new P5.Speech object

var listbutton; // button

function setup()
{
  // graphics stuff:
  createCanvas(400, 400);
  background(255, 0, 0);
  fill(255, 255, 255, 100);
  // instructions:
  textSize(72);
  textAlign(CENTER);
  text("click me", width/2, height/2);
  // button:
  listbutton = createButton('List Voices');
    listbutton.position(180, 430);
    listbutton.mousePressed(doList);

    // say hello:
  myVoice.speak('yeah, baby!!!');

}

function draw()
{
  // why draw when you can click?
}

function doList()
{
  myVoice.listVoices(); // debug printer for voice options
}

function keyPressed()
{
  background(255, 0, 0); // clear screen
}

function mousePressed()
{
  // if in bounds:
  if(mouseX<width && mouseY<height) {
    ellipse(mouseX, mouseY, 50, 50); // circle
    // randomize voice and speak word:
    myVoice.setVoice(Math.floor(random(myVoice.voices.length)));
    myVoice.speak(words[iptr]);
    iptr = (iptr+1) % words.length; // increment
  }
}

</script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
