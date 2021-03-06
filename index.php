<!DOCTYPE html>
<html lang="en">

<head>

    <title>Huset - KBH</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="events.css">
    <link rel="stylesheet" href="nyhedsbrev.css">

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">


    <!--<link rel="manifest" href="site.webmanifest">-->
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">

    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">



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
            font-family: Avenir, Verdana, sans-serif;


        }

        body {
            min-height: 100vh;
            display: grid;
            grid-template-rows: 1fr auto;
            /*background: #FFF;*/
            background-image: url(pics/baggrund.jpg);

        }

        .slideshow {
            width: 100%;
            position: relative;
            margin-bottom: 50px;

        }

        .slideshow img {
            width: 100%;
        }

        .slideNumber {
            color: #fFF;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
            background-color: transparent;
        }

        .slideText {
            color: #FFF;
            font-size: 15px;
            padding: 20px 0px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
            background-color: transparent;
        }

        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 45%;
            width: auto;
            color: #FFF;
            font-weight: bold;
            font-size: 3em;
            transition: 0.3s ease;
            border-radius: 0 3px 3px 0;
            margin: 0 20px;
            background-color: transparent;
        }

        .prev:hover,
        .next:hover {
            font-size: 3.2em;
        }


        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        .slide {
            display: none;
        }

        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        @media screen and (min-width:650px) {


            .slideshow {
                width: 70vw;
                margin-top: 5vw;
                margin: 0 auto;


            }

        }

        @media screen and (min-width:1000px) {


            .slideshow {
                width: 50vw;


            }
        }

        @media screen and (min-width:1300px) {
            .slideshow {
                width: 50vw;

            }

        }

    </style>
</head>

<body>

    <?php include "header.html"; ?>


    <div class="slideshow">


        <div class="slide fade">

            <img src="pics/2.jpg" alt="">

        </div>
        <div class="slide fade">

            <img src="bastard_web_forside.jpg" alt="">

        </div>
        <div class="slide fade">

            <img src="huset.jpg" alt="">

        </div>


        <a class="prev" onclick="plusOne(-1)">&#10094;</a>
        <a class="next" onclick="plusOne(1)">&#10095;</a>


    </div>

    <?php include "main.html"; ?>
    <?php include "nyhedsbrev.html";?>
    <?php include "footer.html"; ?>


    <script>
        let wpJSON;
        let events = [];
        let dest = document.querySelector(".data-container");
        document.addEventListener("DOMContentLoaded", hentJson);


        let slideNumber = 1;
        let slides = document.querySelectorAll(".slide");

        function showSlides(n) {
            let i;

            if (n > slides.length) {
                slideNumber = 1
            }
            if (n < 1) {
                slideNumber = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            slides[slideNumber - 1].style.display = "block";



        }

        showSlides(slideNumber);


        console.log(slides.length);

        function plusOne(n) {
            showSlides(slideNumber += n);
        }




        function autoSlide() {
            console.log(slideNumber);

            if (slideNumber <= slides.length) {
                slideNumber++;
            }
            if (slideNumber > slides.length) {
                slideNumber = 1;
            }



            showSlides(slideNumber);



        }


        setInterval(autoSlide, 5000);





        async function hentJson() {
            let myJson = await fetch("http://davidfraenkeldesigns.dk/kea/2-semester/huset/wordpress/wp-json/wp/v2/events/?per_page=6");
            wpJSON = await myJson.json();
            visJson();
        }




        function visJson() {
            let myTemplate = document.querySelector(".data-template");


            wpJSON.sort(function(a, b) {

                return a.acf.dato - b.acf.dato;
            });


            wpJSON.forEach(post => {

                    let klon = myTemplate.cloneNode(true).content;



                    let year = post.acf.dato.substring(0, 4);
                    let month = post.acf.dato.substring(4, 6);
                    let day = post.acf.dato.substring(6, 8);







                    if (post.acf.events == "Film", "Musik", "Art", "Teater", "Stand_up", "Diverse") {

                        klon.querySelector("[data-overskrift]").textContent = post.acf.titel;

                        klon.querySelector("[data-genre]").textContent = post.acf.genre;

                        klon.querySelector("[data-billede]").src = post.acf.billede;

                        /* klon.querySelector("[data-lang-beskrivelse]").textContent = post.acf.Lang_beskrivelse;*/

                        klon.querySelector("[data-lokation]").textContent = "Sted: " + post.acf.sted;
                        if (post.acf.pris == "0") {
                            klon.querySelector("[data-pris]").textContent = "Gratis";
                        } else {
                            klon.querySelector("[data-pris]").textContent = "Pris: " + post.acf.pris + ",-";
                        }


                        /*klon.querySelector("[data-dato]").textContent = post.acf.dato;*/

                        klon.querySelector("[data-dato]").textContent = day + "." + month + "-" + year;

                        klon.querySelector("[data-tid]").textContent = "Kl. " + post.acf.tid;

                        if (post.acf.buy == true) {

                            klon.querySelector("[data-button]").style.display = "block";


                        }

                        klon.querySelector(".post-container").addEventListener("click", () => {
                            window.location.href = "singleview.php?id=" + post.id;

                        });

                        dest.appendChild(klon);

                    }


                }

            )
        }

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
