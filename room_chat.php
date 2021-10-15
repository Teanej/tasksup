<!DOCTYPE html>
<html>
  <head>
    <title>TasksUp</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <link rel="shortcut icon" href="logo.png" type="image/x-icon" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Raleway&display=swap"
      rel="stylesheet"
    />
   
  </head>
  <style>
    body {
      background:white;
    }
    .main-content {
  margin: 0% 5%;
  font-size: 1em;
  text-shadow: none;
}

.namelite {
  color: black;
  border-radius: 5px;
  padding: 2px 6px;
}

.align-left {
  text-align: left;
}

#chat {
  padding: 0 10px;
  height: 350px;
  overflow: auto;
  background: white;
  border-radius: 5px;
  border: 1px solid seagreen;
}

#msg {
  color: white;
  font-family: "Raleway", cursive;
  background: black;
  outline: none;
  padding: 15px 15px 15px 15px;
  font-size: 15px;
  border-radius: 5px;
  border: 1px solid seagreen;
}

* {
  outline: none;
  font-family: "Raleway", cursive;
}

button,
p,
h2,
h3,
h4,
h5,
h6,
div {
  font-family: "Raleway", cursive;
}

  </style>
  </style>
  <body>

    <div data-role="page" >
      <div data-role="content">
        <div class="main-content">
          <p>
            Room :
            <span id="room" class="namelite">&emsp;&emsp;</span>
          </p>
          <select id="room-list" class="align-left"></select>
          <p>UserName() : <span id="name" class="namelite"></span></p>
          <div id="chat"></div>
          <br />
          <input type="text" id="msg" placeholder="Type().Your().Message()"/>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <a href="game_chat.php">Go to game chat!!!!</a>
          <a href="blog_chat.php">Go to blog chat!!!!</a>
          <br>
          <br>
        </div>
      </div>
    </div>
  </body>
  <script>
    $(document).ready(function () {
      let n = new Function("return (Math.random()*255).toFixed(0)");
      let c = "rgb(" + n() + ", " + n() + "," + n() + ")";
      $(".namelite").css("color", c);
      chatname = prompt("Your Name", "");
      if (chatname == null) {
        chatname = "Newuser";
      }
      $("#name").text(chatname);
      poll();
      get_room();
    });

    $("#msg").on("keyup", function (e) {
      if (e.keyCode == 13) send();
    });

    $("#room-list").on("change", function () {
      changed = $(this).find(":selected").val();
      if (changed == "create room") {
        get_room(true);
      } else {
        $("#room").text(changed);
      }
    });

    function send() {
      msg = $("#msg").val();
      if (msg.trim() == "") {
        $("#msg").val("");
        return;
      }

      post_data = {
        action: "send",
        room: $("#room").text(),
        name: $("#name").text(),
        msg: ":" + msg,
      };
      console.log(post_data);

      $.ajax({
        url: "ajax-server.php",
        type: "POST",
        data: post_data,
        success: function (r) {
          $("#chat").html(r).scrollTop($("#chat")[0].scrollHeight);
          $("#msg").val("");
        },
      });
    }

    function poll() {
      room = $("#room").text();
      if (room.trim() != "") {
        $.ajax({
          url: "ajax-server.php",
          type: "POST",
          data: { action: "poll", room: room },
          success: function (r) {
            $("#chat").html(r);
          },
        });
      }
      setTimeout(poll, 1000);
    }

    function get_room(create = false) {
      post_data = { action: "room" };
      if (create) {
        new_room = "";
        new_room = new_room.replaceAll(" ", "-");
        new_room += prompt("Name of your Room()");
        post_data["new"] = new_room;
      }
      console.log(post_data);

      $.ajax({
        url: "ajax-server.php",
        type: "POST",
        data: post_data,
        success: function (r) {
          console.log(r);
          obj = JSON.parse(r);
          list_rooms = "";
          for (id in obj) {
            list_rooms +=
              "<option value='" +
              obj[id] +
              "'>CHAT ROOM : " +
              obj[id] +
              "</option>";
          }
          list_rooms +=
            "<option value='create room'>======== CREATE A NEW ROOM ========</option>";

          $("#room-list").html(list_rooms).selectmenu("refresh", true);
          room = $("#room").text();
          if (room.trim() == "") {
            $("#room").text("default-chat");
          }
          if (create) {
            alert("CREATE A NEW ROOM : " + new_room);
            $("#room").text($("#room-list").find(":selected").val());
          }
        },
      });
    }
  </script>
</html>