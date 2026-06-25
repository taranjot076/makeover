<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Coming Soon | Makeoverz By Lovepreet</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    min-height:100vh;
    background: radial-gradient(circle at top, #ffdde1, #ee9ca7, #5a0c1d);
    display:flex;
    justify-content:center;
    align-items:center;
    overflow:hidden;
    color:#fff;
}

/* Background glowing blobs */
.blob{
    position:absolute;
    width:350px;
    height:350px;
    background:rgba(255,255,255,0.18);
    filter:blur(120px);
    border-radius:50%;
    animation:blobMove 14s infinite alternate ease-in-out;
}
.blob.one{top:-80px; left:-80px;}
.blob.two{bottom:-100px; right:-100px; animation-delay:3s;}

@keyframes blobMove{
    from{transform:translateY(0) translateX(0);}
    to{transform:translateY(80px) translateX(60px);}
}

/* Main card */
.container{
    position:relative;
    background:rgba(255,255,255,0.18);
    backdrop-filter:blur(18px);
    border-radius:24px;
    padding:50px 40px;
    max-width:560px;
    width:92%;
    text-align:center;
    box-shadow:0 40px 80px rgba(0,0,0,0.45);
    animation:fadeUp 1.4s ease forwards;
}

@keyframes fadeUp{
    from{opacity:0; transform:translateY(50px) scale(0.95);}
    to{opacity:1; transform:translateY(0) scale(1);}
}

/* Shimmer heading */
h1{
    font-size:42px;
    font-weight:700;
    letter-spacing:2px;
    background:linear-gradient(90deg,#fff,#ffd1dc,#fff);
    background-size:200%;
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
    animation:shimmer 3s infinite linear;
}

@keyframes shimmer{
    from{background-position:0%;}
    to{background-position:200%;}
}

.tagline{
    font-size:18px;
    margin:15px 0 30px;
    opacity:0.95;
}

.launch-date{
    font-weight:600;
    letter-spacing:1px;
}

/* Countdown */
.countdown{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:18px;
}

.time-box{
    background:rgba(255,255,255,0.22);
    border-radius:18px;
    padding:20px 10px;
    transition:0.4s;
    transform-style:preserve-3d;
}

.time-box:hover{
    transform:translateY(-10px) rotateX(10deg) rotateY(-10deg);
    box-shadow:0 20px 40px rgba(0,0,0,0.4);
}

.time-box span{
    display:block;
    font-size:36px;
    font-weight:700;
}

.time-box small{
    font-size:13px;
    letter-spacing:1px;
    text-transform:uppercase;
    opacity:0.85;
}

/* Footer text */
.footer-text{
    margin-top:30px;
    font-size:15px;
    opacity:0.85;
}

/* WhatsApp Button */
.whatsapp-btn{
    position:fixed;
    bottom:30px;
    right:30px;
    width:65px;
    height:65px;
    background:#25D366;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    box-shadow:0 15px 35px rgba(0,0,0,0.5);
    animation:whatsPulse 2s infinite;
    z-index:999;
}

.whatsapp-btn:hover{
    transform:scale(1.1);
}

.whatsapp-btn img{
    width:34px;
}

@keyframes whatsPulse{
    0%{box-shadow:0 0 0 rgba(37,211,102,0.6);}
    70%{box-shadow:0 0 0 25px rgba(37,211,102,0);}
    100%{box-shadow:0 0 0 rgba(37,211,102,0);}
}

/* Responsive */
@media(max-width:480px){
    h1{font-size:30px;}
    .countdown{grid-template-columns:repeat(2,1fr);}
}
</style>
</head>
<body>

<div class="blob one"></div>
<div class="blob two"></div>

<div class="container">
    <h1>Coming Soon</h1>
    <p class="tagline">
        Makeoverz By Lovepreet<br>
        <span class="launch-date">Launching 1 April 2026</span>
    </p>

    <div class="countdown">
        <div class="time-box"><span id="days">0</span><small>Days</small></div>
        <div class="time-box"><span id="hours">0</span><small>Hours</small></div>
        <div class="time-box"><span id="minutes">0</span><small>Minutes</small></div>
        <div class="time-box"><span id="seconds">0</span><small>Seconds</small></div>
    </div>

    <p class="footer-text">
        Bridal • Party • Makeup • Hair • Nails ✨
    </p>
</div>

<!-- WhatsApp Booking Button -->
<a href="https://wa.me/918725859667?text=Hi%20I%20want%20to%20book%20an%20appointment%20with%20Makeoverz%20By%20Lovepreet"
   target="_blank"
   class="whatsapp-btn"
   title="Book on WhatsApp">
    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg">
</a>

<script>
const launchDate = new Date("April 1, 2026 00:00:00").getTime();

function updateCountdown(){
    const now = new Date().getTime();
    const diff = launchDate - now;

    if(diff <= 0){
        document.querySelector('.container').innerHTML =
        "<h1>We Are Live 🎉</h1><p class='tagline'>Bookings Open on WhatsApp</p>";
        return;
    }

    document.getElementById("days").innerText = Math.floor(diff / (1000*60*60*24));
    document.getElementById("hours").innerText = Math.floor((diff%(1000*60*60*24))/(1000*60*60));
    document.getElementById("minutes").innerText = Math.floor((diff%(1000*60*60))/(1000*60));
    document.getElementById("seconds").innerText = Math.floor((diff%(1000*60))/1000);
}

updateCountdown();
setInterval(updateCountdown,1000);
</script>

</body>
</html>
