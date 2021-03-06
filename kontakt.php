<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="events.css">
    <link rel="stylesheet" href="nyhedsbrev.css">
    <title>Kontakt</title>
    <style>

           :root {
            --blaa: rgb(36, 25, 93);
            --groen: rgb(0, 89, 36);
            --roed: rgb(211, 7, 42);
            --graa: rgb(157, 157, 156);
            --lyseblaa: rgb(233, 242, 253);
            --lysegroen: rgb(226, 238, 216);
            --lyseroed: rgb(252, 229, 241);
        }


        * {
            margin: 0;
            padding: 0;
            font-family: "Avenir", Verdana, sans-serif;
        }
        body {
            min-height: 100%;
            display: grid;
            grid-template-rows: 1fr auto;
            background-image: url(pics/baggrund.jpg);
        }

        .kontakt {
            max-width: 350px;
            margin: 0 auto;
               color: white;
        }
        .kontakt p {
            padding: 10px;
        }

        .kontakt h1 {
            padding: 10px;
        }

        .kontakt a {
               color: white;
        }


        .åbningstider {
            max-width: 350px;
            margin: 0 auto;
               color: white;
        }

        .åbningstider h2 {
            padding: 10px;
        }

        .åbningstider h3 {
            padding-top: 10px;
        }

        .åbningstider ul {
            padding: 10px;
        }

         .åbningstider ul li{
            margin-left: 20px;
                color: white;
        }

        .kort_over_huset {
            display: flex;
            justify-content: center;
            margin-top: 40px;
            margin-bottom: 40px;
        }

        .kort_over_huset iframe {
            height: 200px;
            width: 350px;
        }

        .kontakt_formular input {
            background-color: transparent;
            border: none;
            border-bottom: 1px solid white;
            width: 300px;
            margin-left: 10px;
        }

        .kontakt_formular {
        max-width: 325px;
        margin: 0 auto;
        background-color: rgba(33, 25, 25, 0.61);
        }

        .kontakt_formular h2 {
            margin-left: 10px;
               color: white;
        }

        .kontakt_formular h3 {
            padding-bottom: 5px;
            padding-top: 15px;
            margin-left: 10px;
               color: white;
        }

        textarea {
            background-color: transparent;
            border: none;
            border-bottom: 1px solid white;
            padding-top: 20px;
            color: grey;
            resize: none;
            width: 300px;
            margin-bottom: 20px;
            margin-left: 10px;
        }

             .nyhedsbrev {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 60px;
           background-color: rgba(33, 25, 25, 0.95);
        }

        .nyhedsbrev a {
            text-decoration: none;
            color: white;
            cursor: pointer;
        }

        .nyhedsbrev p {
            color: rgba(211, 211, 211, 0.81);
            text-align: center;
            font-size: 10px;
            vertical-align: middle;
            padding: 15px;


        }

        .close_nyhedsbrev {
            padding-left: 10px;
            cursor: pointer;
        }

        [data-button] {
            border: 2px solid rgba(211, 211, 211, 0.81);
            background-color: rgba(33, 25, 25, 0.95);
            color: rgba(211, 211, 211, 0.81);
            border-radius: 2em;
            height: 40px;
            min-width: 125px;
            padding: 0 30px;
            font-size: 16px;
            cursor: pointer;
            transition: .4s;
            margin-bottom: 30px;
            margin-left: 10px;
        }

        @media screen and (min-width:650px) {

            .kort_over_huset iframe {
            height: 400px;
            width: 500px;
        }
              .kontakt_formular {
                max-width: 420px;
                margin: 0 auto;
            }

            .kontakt_formular input {
                width: 400px;
            }

            textarea {
                width: 400px;
            }
                   .nyhedsbrev p {
                padding: 0;
                line-height: 50px;
                font-size: 11px;
            }
    }

        @media screen and (min-width:800px) {

        .kort_over_huset iframe {
            height: 400px;
            width: 700px;
        }

        .flex_container {
            display: flex;
            justify-content: center;
        }
    }

        @media screen and (min-width:1000px) {
    .kort_over_huset iframe {
            height: 500px;
            width: 800px;
        }
               .nyhedsbrev {
                height: 50px;
            }

            .nyhedsbrev p {
                padding: 0;
                font-size: 15px;
            }

    }

        @media screen and (min-width:1300px) {

        .kontakt {
            margin: 30px;
        }

        .åbningstider {
            margin: 30px;
        }

        .kontakt_formular input {
                width: 400px;
        }

            textarea {
                width: 400px;
            }
    }

    </style>
</head>

<body>

    <?php include "header.html";?>

    <main>

        <article class="indhold">
            <div class="flex_container">
                <div class="kontakt">
                    <h1>Kontakt Huset</h1>
                    <p>Kontakt HUSET-KBH. Du kan finde os på Rådhusstræde 13. 1466 København K. Du kan også ringe til os på <a href="tel:+4521512151">21 51 21 51</a> eller kigge forbi vores hjemmeside på: <a href="info@huset-kbh.dk">info@huset-kbh.dk</a></p>
                    <p>Du kan også komme forbi os! Husets reception har åbent for henvendelser i hverdage ml. 11.00-15. Vi ses i HUSET!</p>
                </div>
                <div class="åbningstider">
                    <h2>Husets åbningstider</h2>
                    <h3>Bastard Café</h3>
                    <ul>
                        <li>Mandag-torsdag: 12.00-00.00</li>
                        <li>Fredag-lørdag: 12.00-02.00</li>
                        <li>Søndag: 12.00-00.00</li>
                    </ul>
                    <h3>Spisehuset Fair</h3>
                    <ul>
                        <li>Tirsdag-lørdag: 17.00-22.00</li>
                    </ul>
                </div>
            </div>
            <div class="kort_over_huset">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d8998.902439035684!2d12.5747148!3d55.6763715!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdb78617809263eb5!2sHuset-KBH!5e0!3m2!1sda!2sdk!4v1512550398733"></iframe>
            </div>
            <div class="kontakt_formular">
                <h2>Kontakt Os</h2>
                <div class="navn">
                    <h3>Fulde navn</h3>
                    <input type="text" placeholder="Navn">
                </div>
                <div class="mail">
                    <h3>Mail</h3>
                    <input type="text" placeholder="E-mail.">
                </div>
                <div class="telefon">
                    <h3>Telefon</h3>
                    <input type="text" placeholder="Tel."><br>
                </div>
                <textarea rows="4" cols="50">Send din forespørgsel til vores info-mail, og vi sender dig videre til rette vedkommende</textarea>
                <button data-button>Send</button>
            </div>
        </article>
    </main>

    <?php include "nyhedsbrev.html";?>

    <?php include "footer.html";?>

    <script>
        document.querySelector(".close_nyhedsbrev").addEventListener("click", () => {
            document.querySelector(".nyhedsbrev").style.display = "none";
        })

              function toggleMenu() {
            document.querySelector(".logoPil").classList.toggle("rotatePil");


            document.querySelector("ul").classList.toggle("open_nav");

        }
        document.querySelector(".logoPil").addEventListener("click", toggleMenu);

        document.querySelector(".logoPil").addEventListener("click", function() {
            event.stopPropagation();
        });

    </script>
</body>

</html>
