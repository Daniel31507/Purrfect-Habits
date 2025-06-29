
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hauptseite | Purrfect Habits</title>
  <?php

  echo '<link    href="../css/hauptseite.css'   . '?' . time() . '" rel="stylesheet">';
  echo '<link    href="../css/animation.css'   . '?' . time() . '" rel="stylesheet">';
  echo '<script  src="../js/hauptseite.js'    . '?' . time() . '" defer></script>';
  ?>
</head>

<body>

  <div id="catHead">

  </div>


  <div id="book" onclick="relocateToPage()">
    <img src="../img/buch.png">
  </div>

  <div class="container">
    <div class="clock">
      <div style="--clr: #ff3d58; --h: 34px" id="hour" class="hand">
        <i></i>
      </div>
      <div style="--clr: #00a6ff; --h: 45px" id="min" class="hand">
        <i></i>
      </div>
      <div style="--clr: #ffffff; --h: 48px" id="sec" class="hand">
        <i></i>
      </div>

      <span style="--i: 1"><b>1</b></span>
      <span style="--i: 2"><b>2</b></span>
      <span style="--i: 3"><b>3</b></span>
      <span style="--i: 4"><b>4</b></span>
      <span style="--i: 5"><b>5</b></span>
      <span style="--i: 6"><b>6</b></span>
      <span style="--i: 7"><b>7</b></span>
      <span style="--i: 8"><b>8</b></span>
      <span style="--i: 9"><b>9</b></span>
      <span style="--i: 10"><b>10</b></span>
      <span style="--i: 11"><b>11</b></span>
      <span style="--i: 12"><b>12</b></span>
    </div>
  </div>

  <div id="arrowButton" onclick="arrowButton()">&#8680</div>

  <div id="datum"></div>
</body>

</html>