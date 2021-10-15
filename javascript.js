/* Version 1.1 Build 1 */

$(document).ready(function () {
  var xmlhttp;

  function loadXMLDoc(url, cfunc) {
    if (window.XMLHttpRequest) {
      xmlhttp = new XMLHttpRequest();
    } else {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = cfunc;
    xmlhttp.open("POST", url, true);
    xmlhttp.send();
  } // loadXMLDoc()

  function loadChat() {
    loadXMLDoc("chatlog.txt", function () {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("chat").innerHTML = "";
        document.getElementById("chat").innerHTML = xmlhttp.responseText;
      } // if
    }); // loadXMLDoc()
  } // loadChat()

  // scrollt nach unten
  function scrollToBottom() {
    window.setTimeout(function () {
      window.scrollTo(0, document.body.scrollHeight);
    }, 200);
    window.setTimeout(function () {
      window.scrollTo(0, document.body.scrollHeight);
    }, 250);
    window.setTimeout(function () {
      window.scrollTo(0, document.body.scrollHeight);
    }, 300);
    window.setTimeout(function () {
      window.scrollTo(0, document.body.scrollHeight);
    }, 350);
    window.setTimeout(function () {
      window.scrollTo(0, document.body.scrollHeight);
    }, 400);
    window.setTimeout(function () {
      window.scrollTo(0, document.body.scrollHeight);
    }, 450);
    window.setTimeout(function () {
      window.scrollTo(0, document.body.scrollHeight);
    }, 500);
  }

  function GET(name) {
    return unescape(
      (RegExp(name + "=" + "(.+?)(&|$)").exec(location.search) || [, ""])[1]
    );
  }

  if (
    navigator.userAgent.match(/iPhone/i) ||
    navigator.userAgent.match(/iPod/i) ||
    navigator.userAgent.match(/iPad/i)
  ) {
    $("*").click(function () {});
  } // if

  window.onload = function () {
    $("#new_name").val(GET("name"));
    loadChat();
    scrollToBottom();
  };

  setInterval(function () {
    loadChat();
  }, 2000);
}); // document.ready

function checkSubmit(e) {
  if (e && e.keyCode == 13) {
    var name = $("#new_name").val();
    var message = $("#new_message").val();
    $("#new_message").attr("placeholder", "Sending…");
    var entry =
      "name=" +
      encodeURIComponent(name) +
      "&message=" +
      encodeURIComponent(message);

    $.ajax({
      url: "write.php",
      type: "POST",
      data: entry,
      success: function () {
        $("#new_message").val("");
        window.setTimeout(function () {
          $("#new_message").attr("placeholder", "Sent.");
          window.setTimeout(function () {
            $("#new_message").attr("placeholder", "Message");
          }, 1000);
        }, 1000);
      }, // success
    }); // ajax request
  } // if
} // check submit
