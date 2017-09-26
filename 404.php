<?php get_header(); ?>

  <div class="page-not-fond">
    <h1>404</h1>
    <h2>Страница не найдена</h2>
    <br>
    <p class="page-not-fond_message">
      Вы будете перенаправлены на
      <a href="<?php echo get_home_url(); ?>"> главную страницу </a> через
      <span id="pnf-couner" class="pnf-couner">5</span>
      <span id="pnf-couner-text">секунд.</span>
    </p>
  </div>

  <style>
    .page-not-fond {
      padding-top: 50px;
      text-align: center;
      color: #222;
      padding-bottom: 50px;
    }
    .pnf-couner-text {
      min-width: 100px;
      display: inline-block;
      text-align: left;
    }
    h1{
      margin-top: 30px;
      margin-bottom: -60px;
      font-size: 180px;
    }
    h2{
      text-transform: uppercase;
      font-size: 24px;
    }
  </style>

  <script>
    var seconds = 5; 
    var text = 'секунд.';

    function switchText () {
      switch (seconds) {
        case 1 : return 'секунду.';
          break;
        case 2 : return 'секунды.';
          break;
        case 3 : return 'секунды.';
          break;
        case 4 : return 'секунды.';
          break;
        default : return 'секунд.';
          break;
      }
    }

    var secPlace = document.getElementById('pnf-couner');
    var textPlace = document.getElementById('pnf-couner-text');
    secPlace.innerHTML = seconds;
    textPlace.innerHTML = text;

    var Timer = setInterval ( setState, 1000);

    function setState() {
      secPlace.innerHTML = seconds;
      textPlace.innerHTML = switchText();
      seconds--;

      if (seconds < 0) {
        clearInterval(Timer); 
        window.location = "";
      }
    }
  </script>

<?php get_footer(); ?>