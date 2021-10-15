<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TasksUp</title>
  <link rel="shortcut icon" href="logo.png" type="image/x-icon" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Raleway&display=swap"
    rel="stylesheet"
  />

</head>
<body>
  <style>
    * {
      font-family: "Raleway";
      outline: none;
      
    }
    input,button {
      width: 250px;
      height: 20px;
    }
    button {
      background: royalblue;
      color: white;
      border: none;
      border-radius: 25px;
    }
    body {
      background: black;
      color: white;
    }
  </style>
<section style="display: block; text-align: center; margin: auto;">
  <div>
    <h2>Ball In the Office(TasksUp <img src="logo.png" width="25" height="25"> )</h2>
    <button onclick="location.reload()">Restart</button>
        <canvas
          id="canvas"
          height="600"
          width="600"
          style="border: 1px solid black; background: grey;"
          >Heyyy canvas is not supported</canvas
        >
      </div>

      <br>
      <br>
      <br>
      <input type="text" placeholder="Insert your name" id="input">
      <br>
      <br>

      <p id="text"></p>
      <br />
    <br />
    <p>Scores:</p>
    <div id="box"></div>
    <br>
    <br>
    <br>
    <a href="room_chat.php">Go to room chat!!!!</a>
    <a href="blog_chat.php">Go to blog chat!!!!</a>

    </section>
    <script src=https://cdn.pubnub.com/sdk/javascript/pubnub.4.28.2.min.js></script>
    <script>
      const canvas = document.getElementById("canvas");
      const ctx = canvas.getContext("2d");
      const canvasH = canvas.height;
      const canvasW = canvas.width;

      let ball = { x: 150, y: 0, w: 15 };
      let platformH = 10;
      let plSpeed = 1;
      let platformW = canvasW;
      let plDiff = 50;
      let leftPressed = (rightPressed = false);
      let moveSpeed = 2;
      let score = 0;
      let interval = null;
      let scoreInterval = null;

      function randHoleX() {
        return Math.floor(Math.random() * 270);
      }

      let platforms = [{ x: 0, y: canvasH, holeX: randHoleX(), holeW: 20 }];
      drawBall();
      drawPlatforms();
      movePlatforms();
      nagivateBall();

      scoreInterval = setInterval(() => {
        score++;
      }, 1000);

      function movePlatforms() {
        let count = 0;
        if (interval) return;
        interval = setInterval(() => {
          checkGameOver();
          if (count === Math.floor(plDiff / plSpeed)) {
            if (platforms.length > 20) {
              platforms.splice(0, 4);
            }
            addNewPlatform();
            count = 0;
          }

          platforms.forEach((pl) => (pl.y -= plSpeed));

          const closest = platforms.find(
            (pl) => ball.y < pl.y + 10 && ball.y > pl.y - ball.w
          );

          if (closest) {
            holdAndDrop(closest);
          } else {
            ball.y += 5;
          }

          ctx.clearRect(0, 0, canvasW, canvasH);

          drawPlatforms();
          drawBall();
          drawScore();
          count++;

          console.log(platforms.length);
        }, 20);
      }

      function checkGameOver() {
        if (ball.y < 0) {
          document.getElementById("text").innerHTML = "Game Is Over, you can publish your score to chat and compare it with others!";
          reset();
        }
      }

      function reset() {
        ball = { x: 150, y: 0, r: 5 };
        platforms = [{ x: 0, y: canvasH, holeX: randHoleX(), holeW: 20 }];
        clearInterval(interval);
        clearInterval(scoreInterval);
        interval = null;
        scoreInterval = null;
        movePlatforms();
      }

      function addNewPlatform() {
        const lastPlatform = platforms[platforms.length - 1];
        platforms.push({
          x: 0,
          y: lastPlatform.y + plDiff,
          holeX: randHoleX(),
          holeW: 20,
        });
      }

      function drawPlatforms() {
        platforms.forEach((pl) => {
          createPl(pl);
          createHole(pl);
        });

        function createHole(pl) {
          ctx.beginPath();
          ctx.rect(pl.holeX, pl.y, pl.holeW, platformH);
          ctx.fillStyle = "white";
          ctx.fill();
          ctx.closePath();
        }

        function createPl(pl) {
          ctx.beginPath();
          ctx.rect(pl.x, pl.y, platformW, platformH);
          ctx.fillStyle = "lightgrey";
          ctx.fill();
          ctx.closePath();
        }
      }

      function holdAndDrop(closest) {
        if (ball.y > closest.y - ball.w) {
          if (
            ball.x > closest.holeX &&
            ball.x < closest.holeX + closest.holeW
          ) {
            ball.y += 1;
          } else {
            ball.y = closest.y - ball.w;
          }
        }
      }

      function drawBall() {
        // Navigation
        if (leftPressed && ball.x - ball.w > 0) {
          ball.x -= moveSpeed;
        }
        if (rightPressed && ball.x + ball.w < canvasW) {
          ball.x += moveSpeed;
        }

        ctx.beginPath();
        const img = new Image();
        img.src = "./ball.png";
        ctx.drawImage(img, ball.x, ball.y, ball.w, ball.w);
        ctx.closePath();
      }

      function drawScore() {
        ctx.beginPath();
        ctx.fillStyle = "black";
        ctx.fill();
        ctx.fillText("Score: " + score, 10, 10);
        ctx.closePath();
      }

      function nagivateBall() {
        document.addEventListener("keydown", (e) => {
          if (e.getModifierState("Alt")) {
            if (e.key === "ArrowLeft") {
              moveSpeed = 10;
            }

            if (e.key === "ArrowRight") {
              moveSpeed = 10;
            }
          }

          if (e.key === "ArrowLeft") {
            leftPressed = true;
          }

          if (e.key === "ArrowRight") {
            rightPressed = true;
          }
        });

        document.addEventListener("keyup", (e) => {
          if (e.key === "ArrowLeft") {
            leftPressed = false;
          }

          if (e.key === "ArrowRight") {
            rightPressed = false;
          }

          moveSpeed = 4;
        });
      }
      (function() {
        var pubnub = new PubNub({
            publishKey: 'demo',
            subscribeKey: 'demo'
        });
        function $(id) {
            return document.getElementById(id);
        }
        var box = $('box'),
            input = $('input'),
            channel = 'tasksup_game_chat_channel';
        pubnub.addListener({
            message: function(obj) {
                box.innerHTML = ('' + obj.message).replace(/[<>]/g, '') + '<br>' + box.innerHTML
            }
        });
        pubnub.subscribe({
            channels: [channel]
        });
        input.addEventListener('keyup', function(e) {
            if ((e.keyCode || e.charCode) === 13) {
                pubnub.publish({
                    channel: channel,
                    message: input.value + " has a score of: " + score + "!",
                    x: (input.value = '')
                });
            }
        });
        pubnub.fetchMessages(
  {
    channels: [channel],
    end: '15343325004275466',
    count: 25 // default/max is 25 messages for multiple channels (up to 500)
  },
  function(status, response) {
    console.log(response)
    for (let i = 0; i < response.channels.tasksup_game_chat_channel.length; i++) {
      box.append( response.channels.tasksup_game_chat_channel[i].message, document.createElement("br"), document.createElement("br"));
    }
  }
)
    })();
    </script>
</body>
</html>