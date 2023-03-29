<!DOCTYPE html>
<html lang="en">

<body>

  <script>
    document.querySelector(".load").style.overflowY = "hidden";

    window.addEventListener("load", function() {
      document.querySelector(".loading").style.visibility = "hidden";
      document.querySelector(".load").style.overflowY = "visible";
    });

    window.addEventListener("beforeunload", function() {
      document.querySelector(".loading").style.visibility = "visible";
    });
  </script>

  <script>
    const myCarouselElement = document.querySelector('#carouselExampleRide')

    const carousel = new bootstrap.Carousel(myCarouselElement, {
      interval: 5000,
      touch: false
    })
  </script>

  <script>
    const navbar = document.querySelector('.navbar');

    window.addEventListener('scroll', () => {
      if (window.scrollY > 0) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

  <script>
    window.onscroll = function() {
      var btn = document.querySelector('.back-to-top');
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        btn.style.display = "flex";
      } else {
        btn.style.display = "none";
      }
    };

    document.querySelector('.back-to-top').addEventListener('click', function(e) {
      e.preventDefault();
      document.querySelector('#top').scrollIntoView({
        behavior: 'smooth'
      });
    });
  </script>


</body>

</html>