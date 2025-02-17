<footer>
<h2><a href="index.php">AMATERASU</a></h2>

<ul id="footer-left">
    <li><a href="">Site powered by RichCodes</a></li>
    <li><a href="">code of conduct</a></li>
    <li><a href="">Privacy Policy</a></li>
    <li><a href="">Terms of Service</a></li>
</ul>

<ul id="footer-right">
    <li><a href="">Copyright Policy</a></li>
    <li><a href="">Facebook</a></li>
    <li><a href="">Twitter </a></li>
    <li><a href="">Discord </a></li>
</ul>

</footer>
<script>
console.log(document.location.pathname)
const d= document.getElementById("right-nav").getElementsByTagName("a");

for (let i = 0; i< d.length; i++) {
            if(d[i].getAttribute("href")==document.location.pathname){
                d[i].setAttribute("class","active-link")
            }
    }

</script>

</body>
</html>