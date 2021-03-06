<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="nyhedsbrev.css">
    <title>Sinlge Event</title>
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
            background-image: url(pics/baggrund.jpg);
        }

        img {
            width: 100%;
        }

        h2 {

            color: white;
        }

        p {
            color: white;
        }

        .data-container {
            display: grid;
            max-width: 400px;
            margin: 0 auto;
            grid-gap: 10px;
        }

        .post-container {
            padding: 1em;
            grid-row: span 1;
            background-color: rgba(33, 25, 25, 0.61);
            margin-bottom: 50px;

        }

        .post-container p,
        .post-container img,
        .post-container h2,
        .post-container button {
            margin: 7px 0;
            color: rgba(211, 211, 211, 0.81);
        }

        .post-container button {
            display: none;
            border: 2px solid var(--roed);
            background-color: var(--lyseroed);
            color: var(--blaa);
            border-radius: 2em;
            height: 40px;
            min-width: 125px;
            padding: 0 30px;
            font-size: 16px;
            cursor: pointer;
            transition: .5s;
        }

        .post-container button:hover {
            background-color: rgb(255, 179, 179);
        }

        .flex-pris {
            display: flex;
            justify-content: space-between;
            padding-bottom: 10px;
        }

        [data-pris] {
            padding-top: 10px;
        }

        .flex-genre {
            display: flex;
            justify-content: space-between;
        }

        .flex-dato {
            display: flex;
            justify-content: space-between;
        }

        [data-lang-beskrivelse] {}

        .back {
            cursor: pointer;
            position: relative;
            width: auto;
            color: #FFF;
            font-weight: bold;
            font-size: 3em;
            transition: 0.3s ease;
            border-radius: 0 3px 3px 0;
            margin: 0 20px;
            background-color: transparent;
        }

        .back:hover {
            font-size: 3.2em;
        }

        @media screen and (min-width:700px) {

            .data-container {

                max-width: 1000px;

            }

            .post-container p,
            .post-container img,
            .post-container h2,
            .post-container button {
                font-size: 15px;
            }

            img {
                width: 100%;
            }
        }

        @media screen and (min-width:1000px) {

            .post-container p,
            .post-container img,
            .post-container h2,
            .post-container button {
                font-size: 20px;
            }
        }

    </style>
</head>

<body>
    <?php "header.html";?>

    <main class="container">
        <a class="back" onclick="goBack()">&#10094;</a>
        <section class="data-container">
            <article class="post-container">
                <h2 data-overskrift></h2>
                <div>
                    <div class="flex-genre">
                        <p data-genre></p>
                        <p data-lokation></p>
                    </div>

                    <img data-billede>
                    <p data-lang-beskrivelse></p>
                    <div class="flex-dato">
                        <p data-dato></p>
                        <p data-tid></p>
                    </div>
                    <div class="flex-pris">
                        <p data-pris></p>
                        <button data-button>Køb</button>
                    </div>
                </div>
            </article>
        </section>
    </main>

    <?php include "nyhedsbrev.html";?>

    <?php include "footer.html";?>

    <script>
        let urlParams = new URLSearchParams(window.location.search);
        let id = urlParams.get("id");
        let wpJSON;
        document.addEventListener("DOMContentLoaded", hentJson);

        console.log(id);

        async function hentJson() {
            let myJson = await fetch("http://davidfraenkeldesigns.dk/kea/2-semester/huset/wordpress/wp-json/wp/v2/events/?per_page=50");
            wpJSON = await myJson.json();
            visJson();
        }

        function visJson() {



            let display = document.querySelector(".data-container");

            wpJSON.forEach(post => {
                if (post.id == id) {
                    display.querySelector("[data-overskrift]").textContent = post.acf.titel;
                    display.querySelector("[data-genre]").textContent = post.acf.genre;
                    display.querySelector("[data-billede]").src = post.acf.billede;
                    display.querySelector("[data-lokation]").textContent = "Sted: " + post.acf.sted;
                    display.querySelector("[data-pris]").textContent = "Pris: " + post.acf.pris + ",-";
                    display.querySelector("[data-dato]").textContent = post.acf.dato;
                    display.querySelector("[data-tid]").textContent = "Kl. " + post.acf.tid;
                    display.querySelector("[data-lang-beskrivelse]").textContent = post.acf.beskrivelse;
                    display.querySelector("[data-button]").style.display = "block";

                }
            })

        };

             document.querySelector(".close_nyhedsbrev").addEventListener("click", () => {
            document.querySelector(".nyhedsbrev").style.display = "none";
        })

        function goBack() {
            window.history.back();
        }

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
