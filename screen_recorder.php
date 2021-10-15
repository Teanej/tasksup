<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TasksUp</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Raleway&display=swap"
    rel="stylesheet"
  />
  <link rel="shortcut icon" href="logo.png" type="image/x-icon" />  
</head>
<body>
<style>

        
      
* {
  box-sizing: border-box;
  font-family: "Raleway";
  outline: none;
  margin: 0;
  padding: 0;
  text-align: center;
  margin:auto;
}

header {
  text-align: center;
  transition: 0.3s;
  background: whitesmoke;
}

header:hover {
  border-radius: 200px;
  background: black;
  color: white;
}

section {
  text-align: center;
  transition: 0.3s;
  background: black;
  color: white;
}

section:hover {
  border-radius: 200px;
  background: silver;
  color: black;
}

a {
  text-decoration: none;
  color: white;
  background: seagreen;
  border: none;
  border-radius: 25px;
  padding: 10px 10px 10px 10px;
  transition: 0.3s;
}

a:hover {
  padding: 5px 5px 5px 5px;
}

a:active {
  opacity: 0.5;
}

p {
  transition: 0.3s;
}

p:hover {
  font-style: italic;
}

h2 {
  transition: 0.3s;
}

h2:hover {
  width: 500px;
  margin: auto;
  border: 1.5px solid lightgrey;
  border-radius: 25px;
  padding: 10px 10px 10px 10px;
  background: white;
  color: black;
}

button {
  text-decoration: none;
  color: white;
  background: royalblue;
  border: none;
  border-radius: 25px;
  padding: 10px 10px 10px 10px;
  transition: 0.3s;
  text-align: center;
}

button:hover {
  padding: 5px 5px 5px 5px;
}

button:active {
  opacity: 0.5;
}
input,
textarea {
  padding: 10px 10px 10px 10px;
  border: none;
  border-radius: 25px;
  transition: 0.3s;
  resize: none;
}
input:hover {
  opacity: 0.8;
}
textarea:hover {
  opacity: 0.8;
}
input:focus {
  border: 1.5px solid grey;
}
textarea:focus {
  border: 1.5px solid grey;
}
footer {
  text-align: center;
  transition: 0.3s;
}
footer:hover {
  background: black;
  color: white;
}
</style>
<h2>Screen Recording</h2>
    <br>
<button id="start1">
      Start sharing your screen
    </button>
    <button id="stop" disabled>
      Stop sharing your screen
    </button>  
    <br>
    <video autoplay id="video" width="700" height="500">
      <script>
        
const start = document.getElementById("start1");
const stop = document.getElementById("stop");
const video = document.getElementById("video");
let recorder, stream;

async function startRecording() {
  stream = await navigator.mediaDevices.getDisplayMedia({
    video: { mediaSource: "screen" }
  });
  recorder = new MediaRecorder(stream);

  const chunks = [];
  recorder.ondataavailable = e => chunks.push(e.data);
  recorder.onstop = e => {
    const completeBlob = new Blob(chunks, { type: chunks[0].type });
    video.src = URL.createObjectURL(completeBlob);
  };

  recorder.start();
}

start.addEventListener("click", () => {
  start.setAttribute("disabled", true);
  stop.removeAttribute("disabled");

  startRecording();
});

stop.addEventListener("click", () => {
  stop.setAttribute("disabled", true);
  start.removeAttribute("disabled");

  recorder.stop();
  stream.getVideoTracks()[0].stop();
});
      </script>
</body>
</html>