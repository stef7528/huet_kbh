<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="events.css">
    <link rel="stylesheet" href="nyhedsbrev.css">
    <title>Events</title>

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


        #filtrerings_knapper {
            display: flex;
            justify-content: center;
            padding: 12px;
            background-color: rgba(33, 25, 25, 0.95);
            margin-bottom: 5vw;

        }

        .menu-item {
            border: none;
            border-radius: 40px;
            margin: 7px;
            background: transparent;
            font-size: 10px;
            padding: 10px;
            color: white;
            font-family: HUSET, Avenir;
            cursor: pointer;
        }


        body {
            min-height: 100%;
            display: grid;
            grid-template-rows: 1fr auto;
            background-image: url(pics/baggrund.jpg);
        }

        @media screen and (min-width:700px) {

            .menu-item {
                font-size: 15px;
            }

        }

        @media screen and (min-width:1000px) {

            .menu-item {
                font-size: 20px;
            }


            #filtrerings_knapper {
                display: flex;
                justify-content: center;
                padding: 12px;
                margin-bottom: 5vw;

            }

            .menu-item {
                font-size: 25px;
                padding: 14px;
                color: white;

            }
        }
            .menu-item:hover {
                text-shadow: 1px 1px 2px red, 0 0 25px red, 0 0 5px darkred;
            }

            @media screen and (min-width:1300px) {


                header {
                    width: 1300px;
                }

                .desktop_nav_menu {
                    margin: 0 auto;
                }



            }


    </style>
</head>

<body>

    <?php include "header.html";?>


    <main id="indhold">
        <div id="filtrerings_knapper">
            <button class="menu-item" data-kategori="Menu">ALLE EVENTS</button>
            <button class="menu-item" data-kategori="Musik">MUSIK</button>
            <button class="menu-item" data-kategori="Teater">TEATER</button>
            <button class="menu-item" data-kategori="Film">FILM</button>
            <button class="menu-item" data-kategori="Ord">ORD</button>
            <button class="menu-item" data-kategori="Diverse">DIVERSE</button>
        </div>

        <?php include "main.html";?>
    </main>

    <?php include "nyhedsbrev.html";?>

    <?php include "footer.html";?>



    <script>
        let wpJSON;
        let dest = document.querySelector(".data-container");
        let eventFilter = "Menu";
        document.addEventListener("DOMContentLoaded", hentJson);
        async function hentJson() {
            let myJson = await fetch("http://davidfraenkeldesigns.dk/kea/2-semester/huset/wordpress/wp-json/wp/v2/events/?per_page=50");
            wpJSON = await myJson.json();
            visJson();
        }
        document.querySelectorAll(".menu-item").forEach(knap => {
            knap.addEventListener("click", filtrering);
        });

        function filtrering() {
            dest.textContent = "";
            eventFilter = this.getAttribute("data-kategori");
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

                if (post.acf.events == eventFilter || eventFilter == "Menu") {


                    klon.querySelector("[data-overskrift]").textContent = post.acf.titel;
                    klon.querySelector("[data-genre]").textContent = post.acf.genre;
                    klon.querySelector("[data-billede]").src = post.acf.billede;
                    /* klon.querySelector("[data-lang-beskrivelse]").textContent = post.acf.Lang_beskrivelse;*/
                    klon.querySelector("[data-lokation]").textContent = post.acf.sted;
                    klon.querySelector("[data-dato]").textContent = day + "/" + month + "-" + year;
                    klon.querySelector("[data-tid]").textContent = "Kl. " + post.acf.tid;
                    if (post.acf.pris == "0") {
                        klon.querySelector("[data-pris]").textContent = "Gratis";
                    } else {
                        klon.querySelector("[data-pris]").textContent = "Pris: " + post.acf.pris + ",-";
                    }

                    klon.querySelector(".post-container").addEventListener("click", () => {
                        window.location.href = "singleview.php?id=" + post.id;
                    });
                    if (post.acf.buy == true) {
                        klon.querySelector("[data-button]").style.display = "block";
                    }
                    dest.appendChild(klon);
                }
            })
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
