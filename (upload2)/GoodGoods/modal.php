<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>Our First Webpage</title>
        <link rel="shortcut icon" href="images/favicon.png">
  
        <link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">
    </head>
    <style type="text/css">
        html {
    background-color: rgb(236, 236, 236);
    font-family: 'Barlow', sans-serif;
    font-size: 100%;
}

body {
    margin: 0;
}

a {
   text-decoration: none;
   color: black; 
}

a:active {
    color: #fa923f;
}

img:hover {
    cursor: pointer;
}

/*modal*/
.backdrop {
    display: none;
    position: fixed;
    background: rgba(0, 0, 0, 0.5);
    top: 0;
    height: 100vh;
    width: 100vw;
    z-index: 1;
}

.modal {
    display: none;
    position: fixed;
    background: white;
    padding: 10px;
    width: 260px;
    top: 100px;
    left: calc(50% - 140px);
    z-index: 1;    
}

.modal h1 {
    margin: 0;
}

.modal button {
    background: #fa923f;
    color: white;
    border: 1px solid #521751;
    font: inherit;
    font-size: 12px;
    cursor: pointer;
}

.modal button:hover,
.modal button:active {
    background: #521751;
}

.modal button:focus {
    outline: none;
}

@media (min-width: 400px) {
    .modal {
        width: 360px;
        left: calc(50% - 190px);
    }
}

/*header*/

.fixed-bar {
    height: 70px;

}
.page-title {
    position: fixed;
    top: 0;
    width: 100%;
    height: 40px;
    background-color: #521751;
    color: white;
    padding: 10px 0;
    margin: 0;
    text-align: center;
    font-size: 32px;
    font-size: 2rem;
}

/*nav*/
.navigation {
    text-align: center;
    padding: 0;
}


.navigation li {
    display: inline-block;
    width: 20%;
    background-color: rgb(177, 177, 174);
    font-size: 16px;
    font-size: 0.9rem;
}


/*main*/
.trip-text {
    display: none;
}


.trip-images {
    display: flex;
    flex-wrap: wrap;
}

.trip-images img {
    width: 100%;
    height: 100%;
} 

.feedback {
    position: relative;
    bottom: 18.4px;
    background-color: #521751;
    color: white;
    text-align: center;
    margin: 0;
    font-size: 16px;
    font-size: 1rem;
}

/*footer*/
.review-clients {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    border: 1px solid black;
    background-color: white;
    margin: 10px;
}

.review-clients img {
    width: 120px;
}

.review-clients p {
    width: 350px;
    text-align: center;
    font-size: 16px;
    font-size: 1rem;
}

@media (min-width: 400px){
    .navigation li {
        font-size: 1.2rem;
    }
}

@media (min-width: 700px){
    .trip-images img {
        width: 50%;
    } 
    
    .trip-text {
        background-color: #fa923f;
        padding: 0;
        display: flex;
    }

    .trip-text p {
        background-color: #521751;
        color: white;
        text-align: center;
        margin: 0;
        width: 50%;
        font-size: 16px;
        font-size: 1rem;
    }
}
    </style>
    <body>
        <div class="backdrop"></div>
        <div class="modal">
            <h1>Get in Touch</h1>
            <p>Contact me to find out more about my exciting trips!</p>
            <a href="contact/index.html"><button>Contact</button></a>
        </div>
        <header class="fixed-bar"> <h1 class="page-title">Mike's World</h1> </header>
        <nav>
            <ul class="navigation">
                <li>Home</li>
                <li><a href="contact/index.html">Contact</a></li>
            </ul>
        </nav>
        <main>
            <div class="trip-text">
                <p>My SF City Trip</p>
                <p>The California Landscape</p>
            </div>
            <div class="trip-images">
                <button class="trip-image"></button>
                
                <img class="trip-image" src="california.png" alt="Image of the California streets">
            </div>
            <p class="feedback">Do people like my Page</p>
        </main>
        <footer>
            <div class="review-clients">
                <img src="images/image-max.png" alt="Image of Max">
                <p>Max - Awesome page, great work, keep it up!</p>
            </div>
            <div class="review-clients">
                <img src="images/image-manu.png" alt="Image of Manu">
                <p>Manu - Looks really nice, beautiful pictures!</p>
            </div>
        </footer>
    <script>
        var imageSF = document.querySelector('.trip-image');
var backdrop = document.querySelector('.backdrop');
var modal = document.querySelector('.modal');

function openModal() {
    backdrop.style.display = 'block';
    modal.style.display = 'block';
}

function closeModal () {
    backdrop.style.display = 'none';
    modal.style.display = 'none';
}

imageSF.onclick = openModal;
backdrop.onclick = closeModal;

console.log(imageSF);
    </script>
    </body>
</html>