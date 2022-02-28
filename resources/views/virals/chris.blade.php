<html>

<head>
  <title>Game</title>

  <style type="text/css">
    * {
      padding: 0;
      margin: 0;
    }

    canvas {
      position: absolute;
      display: block;
      background: transparent;
      box-shadow: 0px 0px 11px -5px;
    }



    #backgroundCanvas,
    #controlsCanvas,
    #enemiesCanvas,
    #playerCanvas {
      width: 100%;
    }

    body {
      touch-action: manipulation;
      -webkit-touch-callout: none !important;
      -webkit-user-select: none !important;
    }
  </style>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.4.1/p5.min.js"
    integrity="sha512-NxocnqsXP3zm0Xb42zqVMvjQIktKEpTIbCXXyhBPxqGZHqhcOXHs4pXI/GoZ8lE+2NJONRifuBpi9DxC58L0Lw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script type="text/javascript">


    function resize_canvas(canvas) {
      canvas.width = window.innerWidth
      canvas.height = canvas.width * 1.0909
    }

    function resize_all() {
      resize_canvas(document.getElementById('backgroundCanvas'))
      resize_canvas(document.getElementById('enemiesCanvas'))
      resize_canvas(document.getElementById('playerCanvas'))
      resize_canvas(document.getElementById('controlsCanvas'))
    }

    (function () {



      $(document).ready(function () {

        


        LEFT_ARROW_KEY = 37
        RIGHT_ARROW_KEY = 39
        A_KEY = 65
        D_KEY = 68
        H_KEY = 72

        class Position {
          constructor(x, y) {
            this.x = x
            this.y = y
          }
        }

        class Figure {
          constructor(position, width, height) {
            this.position = position
            this.width = width
            this.height = height
          }
        }

        class EnemyFigure extends Figure {
          constructor() {
            super(
              new Position(0, 34),
              151,
              101
            )
          }
        }

        class ExplosionFigure extends Figure {
          constructor() {
            super(
              new Position(0, 342),
              184,
              172
            )
          }
        }

        class PlayerFigure extends Figure {
          constructor() {
            super(
              new Position(0, 135),
              164,
              206
            )
          }
        }

        class BulletFigure extends Figure {
          constructor() {
            super(
              new Position(0, 0),
              37,
              34
            )
          }
        }

        class LeftControlFigure extends Figure {
          constructor() {
            super(
              new Position(0, 0),
              30,
              30
            )
          }
        }

        class RightControlFigure extends Figure {
          constructor() {
            super(
              new Position(30, 0),
              30,
              30
            )
          }
        }

        class ShooterControlFigure extends Figure {
          constructor() {
            super(
              new Position(60, 0),
              60,
              30
            )
          }
        }

        class LeftControl {
          constructor() {
            this.position = new Position(10, game.height - game.width / 10)
            this.width = game.width / 20
            this.height = game.width / 20
            this.figure = new LeftControlFigure()
          }


          clicked(position) {
            if (position.x > this.position.x + this.width) {
              return false
            }
            if (position.x < this.position.x) {
              return false
            }

            if (position.y > this.position.y + this.height) {
              return false
            }

            if (position.y < this.position.y) {
              return false
            }

            return true
          }

          draw() {
            game.contextControls.drawImage(
              game.images[1],
              this.figure.position.x,
              this.figure.position.y,
              this.figure.width,
              this.figure.height,
              this.position.x,
              this.position.y,
              this.width,
              this.height
            );
          }
        }


        class RightControl {
          constructor() {
            this.position = new Position(240, game.height - game.width / 10)
            this.width = game.width / 20
            this.height = game.height / 20
            this.figure = new RightControlFigure()
          }

          clicked(position) {
            if (position.x > this.position.x + this.width) {
              return false
            }
            if (position.x < this.position.x) {
              return false
            }

            if (position.y > this.position.y + this.height) {
              return false
            }

            if (position.y < this.position.y) {
              return false
            }

            return true
          }

          draw() {
            game.contextControls.drawImage(
              game.images[1],
              this.figure.position.x,
              this.figure.position.y,
              this.figure.width,
              this.figure.height,
              this.position.x,
              this.position.y,
              this.width,
              this.height
            );
          }

        }

        class ShooterControl {
          constructor() {
            this.figure = new ShooterControlFigure()
            this.position = new Position(100, game.height - game.width / 10)
            this.width = game.width / 10
            this.height = game.width / 20
          }

          clicked(position) {
            if (position.x > this.position.x + this.width) {
              return false
            }
            if (position.x < this.position.x) {
              return false
            }

            if (position.y > this.position.y + this.height) {
              return false
            }

            if (position.y < this.position.y) {
              return false
            }

            return true
          }

          draw() {
            game.contextControls.drawImage(
              game.images[1],
              this.figure.position.x,
              this.figure.position.y,
              this.figure.width,
              this.figure.height,
              this.position.x,
              this.position.y,
              this.width,
              this.height
            );
          }
        }

        class Enemy {

          /**
           * position: Position
           * */
          constructor(position) {
            this.position = position
            this.width = game.width * 0.1272
            this.height = game.width * 0.0850
            this.figure = new EnemyFigure()
            this.dead = false
            this.deadTime = 20
          }

          moveToTheLeft() {
            this.position.x -= game.enemieSpeed;
          }

          moveToTheRigth() {
            this.position.x += game.enemieSpeed;
          }

          moveDown() {
            this.position.y += game.width * 0.0018
          }

          draw() {
            game.contextEnemies.drawImage(
              game.images[0],
              this.figure.position.x,
              this.figure.position.y,
              this.figure.width,
              this.figure.height,
              this.position.x,
              this.position.y,
              this.width,
              this.height
            );
          }
        }

        class Star {
          constructor(position) {
            this.position = position
            this.size = Math.random() * 5
          }

          static create() {
            let x = Math.floor(Math.random() * game.width)
            let y = Math.floor(Math.random() * game.height)
            return new Star(new Position(x, y))
          }

          static createFromBottom() {
            let x = Math.floor(Math.random() * game.width)
            let y = game.height + 10 // COMENZARA AFUERA DE LA PANTALLA
            return new Star(new Position(x, y))
          }

          moveUp() {
            this.position.y -= 1
          }

          isOutOfScreen() {
            return this.position.y <= -5
          }

        }

        /*======================
             GAME OBJECT
          ======================*/

        var game = {};
        game.stars = []; // VARIABLE ARREGLO DE OBJETO ESTRELLAS
        game.keys = []; // VARIABLE ARREGLO DE OBJETO TECLA
        game.projectiles = []; // VARIABLE ARREGLO DE OBJETO PROYECTIL
        game.enemies = []; // ALMACENARA A CADA UNO DE LOS ENEMIGOS QUE HAY EN PANTALLA
        game.images = []; // CONTENDRÁ LAS IMAGENES DEL JUEGO

        game.width = window.innerWidth; // ALMACENA EL ANCHO DEL JUEGO
        game.height = game.width * 1.0909; // ALMACENA EL ALTO DEL JUEGO
        game.doneImages = 0; // ALMACENA LAS IMAGENES YA CARGADAS
        game.requiredImages = 0; // ALMACENA EL NUMERO DE IMAGENES QUE SE NECESITA
        game.gameOver = false; // ALMACENA SI EL JUGADOR PIERDE
        game.gameWon = false; // ALMACENA SI EL JUGADOR GANA
        game.count = 24; // ALMACENA EL DIVISOR DE UN TIMER
        game.division = 48; // ALMACENA EL DIVIDENDO DE UN TIMER
        game.left = false;
        game.enemieSpeed = 3; // ALMACENA LA VELOCIDAD CON LA QUE SE MUEVEN LOS ENEMIGOS
        game.moving = false;
        game.fullShootTimer = game.width * 0.0181; // ALMACENA LOS FOTOGRAMAS NECESARIOS PARA DISPARAR LA SIGUIENTE BALA
        game.shootTimer = game.fullShootTimer; // ALMACENA EL FOTOGRAMA PARA LLEGAR A LOS FOTOGRAMAS NECESARIO

        game.leftControl = new LeftControl()
        game.shooterControl = new ShooterControl()
        game.rightControl = new RightControl()

        class Player {
          constructor() {
            this.speed = game.width * 0.0054
            this.rendered = false
            this.position = new Position(game.width / 2 - this.width() / 2, game.height - this.height())
            this.figure = new PlayerFigure()
          }

          width() {
            return game.width * 0.1818
          }

          height() {
            return game.width * 0.2209
          }

          moveToTheLeft() {
            this.position.x -= this.speed;
            this.rendered = false;
          }

          moveToTheRigth() {
            this.position.x += this.speed;
            this.rendered = false;
          }

          isOnTheRightEdge() {
            return this.position.x + this.width >= game.width
          }

          isOnTheLeftEdge() {
            return this.position.x <= 0
          }

          shoot() {
            let position = new Position(
              this.position.x + this.width() / 2 - 15,
              this.position.y
            )

            game.projectiles.push(
              new Bullet(position)
            );
          }

          draw() {
            game.contextPlayer.clearRect(
              0,
              this.position.y,
              game.width,
              game.height
            );
            game.contextPlayer.drawImage(
              game.images[0],
              this.figure.position.x,
              this.figure.position.y,
              this.figure.width, this.figure.height,
              this.position.x,
              this.position.y,
              this.width(),
              this.height()
            );
            game.player.rendered = true;
          }
        }

        game.player = new Player()

        /*=========
          METHODS
          ========*/

        game.isMovingToTheLeft = function () {
          return this.keys[LEFT_ARROW_KEY] || this.keys[A_KEY]
        }

        game.isMovingToTheRight = function () {
          return this.keys[RIGHT_ARROW_KEY] || this.keys[D_KEY]
        }

        /*=======
          LIENZOS
          =======*/

        game.contextBackground = document.getElementById('backgroundCanvas').getContext('2d');
        game.contextPlayer = document.getElementById('playerCanvas').getContext('2d');
        game.contextEnemies = document.getElementById('enemiesCanvas').getContext('2d');
        game.contextControls = document.getElementById('controlsCanvas').getContext('2d');

        /*=======
          EVENTOS
          =======*/

        resize_all()

        document.addEventListener("touchstart", function (event) {
          event.preventDefault()
          event.stopPropagation()
          var rect = document.getElementById('controlsCanvas').getBoundingClientRect();

          const position = new Position(
            (event.targetTouches[0].pageX - rect.left) * 1.7073,
            (event.targetTouches[0].pageY - rect.top) * 1.7091
          )

          if (game.leftControl.clicked(position)) {
            game.keys[LEFT_ARROW_KEY] = true
          }

          if (game.rightControl.clicked(position)) {
            game.keys[RIGHT_ARROW_KEY] = true
          }

          if (game.shooterControl.clicked(position)) {
            game.keys[H_KEY] = true
          }

        })


        document.addEventListener("touchend", function () {
          delete game.keys[LEFT_ARROW_KEY]
          delete game.keys[A_KEY]
          delete game.keys[H_KEY]
          delete game.keys[RIGHT_ARROW_KEY]
          delete game.keys[D_KEY]
        })

        $(document).keydown(function (e) {
          game.keys[e.keyCode ? e.keyCode : e.which] = true;
        });

        $(document).keyup(function (e) {
          delete game.keys[e.keyCode ? e.keyCode : e.which];
        });

        document.getElementById("backgroundCanvas").style.background = "#2c3e50";

        /*=========
          FUNCIONES
          =========*/

        class Bullet {
          constructor(position) {
            this.position = position
            this.width = game.width * 0.0363
            this.height = game.width * 0.0395
            this.figure = new BulletFigure()
          }

          moveUp() {
            this.position.y -= game.width * 0.0054
          }

          isOutOfScreen() {
            return this.position.y <= -this.height
          }

          draw() {
            game.contextEnemies.drawImage(
              game.images[0],
              this.figure.position.x,
              this.figure.position.y,
              this.figure.width,
              this.figure.height,
              this.position.x,
              this.position.y,
              this.width,
              this.height
            );
          }
        }

        function addBullet() {

          let position = new Position(
            game.player.position.x + game.player.width() / 2 - 15,
            game.player.position.y
          )

          game.projectiles.push(
            new Bullet(position)
          );
        }

        function showControls() {
          game.leftControl.draw()
          game.shooterControl.draw()
          game.rightControl.draw()
        }

        function init() {
          for (i = 0; i < 600; i++) {
            game.stars.push(Star.create());
          }

          for (y = 0; y < 5; y++) {
            for (x = 0; x < 5; x++) {
              const position = new Position(enemySeparation() * (x + 1), enemySeparation() * (y + 1 / 2))
              game.enemies.push(new Enemy(position))
            }
          }

          showControls()

          function enemySeparation() {
            return game.width * 0.1454
          }

          loop(); // EJECUTA EL BUCLE DE REDIBUJADO

          setTimeout(function () {
            game.moving = true;
          }, 5000);
        }

        function addStars(num) {
          for (i = 0; i < num; i++) {
            game.stars.push(
              Star.createFromBottom()
            );
          }
        }

        function moveStars() {
          for (i in game.stars) {
            if (game.stars[i].isOutOfScreen()) {
              game.stars.splice(i, 1);
            }
            game.stars[i].moveUp();
          }
        }

        function movePlayer() {

          if (game.gameOver || game.gameWon) {
            return
          }

          if (game.isMovingToTheLeft() && !game.player.isOnTheLeftEdge()) {
            game.player.moveToTheLeft()
          }

          if (game.isMovingToTheRight() && !game.player.isOnTheRightEdge()) {
            game.player.moveToTheRigth()
          }
        }

        function moveEnemies() {
          if (game.count % game.division == 0) {
            game.left = !game.left;
          }

          for (i in game.enemies) {
            if (!game.moving) {
              if (game.left) {
                game.enemies[i].moveToTheLeft();
              } else {
                game.enemies[i].moveToTheRigth();
              }
            }
            if (game.moving) {
              game.enemies[i].moveDown();
            }
            if (game.enemies[i].position.y >= game.height) {
              game.gameOver = true;
            }
          }
        }

        function moveBulletsDown() {
          for (i in game.projectiles) {
            game.projectiles[i].moveUp();
            if (game.projectiles[i].isOutOfScreen()) {
              game.projectiles.splice(i, 1);
            }
          }
          if (game.keys[H_KEY] && game.shootTimer <= 0) {
            addBullet();
            game.shootTimer = game.fullShootTimer;
          }
        }

        function detectCollision() {
          for (m in game.enemies) {
            for (p in game.projectiles) {
              if (collision(game.enemies[m], game.projectiles[p])) {
                game.enemies[m].dead = true;
                document.getElementById("audio").pause();
                document.getElementById("audio").currentTime = 0;
                document.getElementById("audio").play();
                game.enemies[m].figure = new ExplosionFigure()
                game.projectiles.splice(p, 1);
              }
            }
          }
        }

        function handleKilledEnemies() {
          for (i in game.enemies) {

            if (!game.enemies[i].dead) {
              continue
            }

            game.enemies[i].deadTime--;

            if (game.enemies[i].deadTime <= 0) {
              game.enemies.splice(i, 1);
            }

          }
        }

        function update() {
          addStars(1);
          game.count++;

          if (game.shootTimer > 0) game.shootTimer--;

          moveStars();

          movePlayer();

          moveEnemies();

          moveBulletsDown();

          detectCollision();

          handleKilledEnemies();

          if (game.enemies.length <= 0) {
            game.gameWon = true;
          }
        }

        function printBackground() {
          game.contextBackground.clearRect(0, 0, game.width, game.height); // LIMPIA LA PANTALLA PARA EVITAR CORRIMIENTOS
          game.contextBackground.fillStyle = "#FFF9C4"; // EL COLOR DEL CONTEXTO DEL FONDO (ESTRELLAS) LAS PINTA DE BLANCO
        }

        function printStars() {
          for (i in game.stars) { // RECORRE DESDE LA PRIMERA ESTRELLA HASTA LA ULTIMA
            var star = game.stars[i]; // ALMACENA EN UNA VARIABLE LA ESTRELLA A DIBUJAR
            game.contextBackground.fillRect(star.position.x, star.position.y, star.size, star.size); // DIBUJA EN EL LIENZO LA ESTRELLA RESPECTIVA
          }
        }

        function printEnemies() {
          game.contextEnemies.clearRect(0, 0, game.width, game.height);
          for (i in game.enemies) {
            game.enemies[i].draw();
          }
        }

        function printBullets() {
          for (i in game.projectiles) {
            game.contextEnemies.clearRect(
              game.projectiles[i].position.x,
              game.projectiles[i].position.y,
              game.projectiles[i].width,
              game.projectiles[i].height
            );

            game.projectiles[i].draw()
          }
        }

        function showLostGame() {
          game.contextBackground.font = `${fontSize()}px josefin sans`;
          game.contextBackground.fillStyle = "white";
          game.contextBackground.fillText("¡Perdiste!", game.width / 2 - game.width * 0.2545, game.height / 2);
        }

        function showWonGame() {

          game.contextBackground.font = `${fontSize()}px josefin sans`;
          game.contextBackground.fillStyle = "white";
          game.contextBackground.fillText("¡Ganaste!", game.width * 0.0727, game.height / 2);
        }

        function fontSize() {
          return game.width * 0.0909
        }

        function render() {
          printBackground();

          printStars();

          if (!game.player.rendered) { // SE EJECUTA EN CASO DE QUE SE HALLA MOVIDO AL JUGADOR SI NO SE MUEVE NO SE RENDERIZA
            game.player.draw();
          }

          printEnemies();

          printBullets();

          if (game.gameOver) {
            showLostGame();
          }
          if (game.gameWon) {
            showWonGame();
          }
        }

        function loop() { // FUNCION QUE EJECUTA EL BUCLE DE REDIBUJADO
          requestAnimFrame(function () { // FUNCION QUE SE EJECUTARA VARIAS VECES PARA REDIBUJAR
            loop(); // SE EJECUTA A LA PROXIMA VECES QUE SE ACEPTE REQUESTANIMFRAME
          });
          update(); // ACTUALIZA AL SIGUIENTE REDIBUJADO
          render();
        }

        function initImages(paths) {
          game.requiredImages = paths.length;
          for (i in paths) {
            var img = new Image;
            img.src = paths[i];
            game.images[i] = img;
            game.images[i].onload = function () {
              game.doneImages++;
            };
          }
        }

        function collision(first, second) {
          return !(first.position.x > second.position.x + second.width ||
            first.position.x + first.width < second.position.x ||
            first.position.y > second.position.y + second.height ||
            first.position.y + first.height < second.position.y);
        }

        function checkImages() {
          if (game.doneImages >= game.requiredImages) {
            init();
            return
          }

          setTimeout(function () {
            checkImages();
          }, 1);

        }

        function main() {
          initImages([
            "./img/sprites.png",
            "./img/controls.png"
          ]);

          checkImages();
        }

        main();
      });
    })();

    FPS = 1000 / 60

    window.requestAnimFrame = (function () {
      return window.requestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        window.oRequestAnimationFrame ||
        window.msRequestAnimationFrame ||
        function (callback) {
          window.setTimeout(callback, FPS);
        };
    })();
  </script>

</head>

<body>

  <audio id="audio" src="{{asset('sounds/enemy-killed.mp3')}}"></audio>

  <div class="container">
    <div class="row">
      <div class="col-1 col-lg-3"></div>
      <div class="col-10 col-lg-6">
        <div class="card">
          <div class="card-body h-100">
            <div id="canvasContainer">
              <canvas id="backgroundCanvas"></canvas>
              <canvas id="enemiesCanvas"></canvas>
              <canvas id="playerCanvas"></canvas>
              <canvas id="controlsCanvas"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-3"></div>

    </div>
  </div>

</body>

</html>