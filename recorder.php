<!DOCTYPE html>
<html>
  <head>
    <title>TasksUp</title>
  
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
     <div id="container">
      <video id="gum" playsinline autoplay muted></video>
      <video id="recorded" playsinline loop></video>

      <div>
        <button id="start">Start camera</button>
        <button id="record" disabled>Record</button>
        <button id="play" disabled>Play</button>
        <button id="download" disabled>Download</button>
      </div>

      <div>
        <h4>Media Stream Constraints options</h4>
        <p>
          Echo cancellation: <input type="checkbox" id="echoCancellation" />
        </p>
      </div>

      <div>
        <span id="errorMsg"></span>
      </div>
    </div>
<br>
<br>
<br>
<br>
<br>
    <a href="screen_recorder.php">Go to screen recorder</a>
 
   
      
    
  </body>
  <script>
    'use strict';

/* globals MediaRecorder */

let mediaRecorder;
let recordedBlobs;

const errorMsgElement = document.querySelector('span#errorMsg');
const recordedVideo = document.querySelector('video#recorded');
const recordButton = document.querySelector('button#record');
const playButton = document.querySelector('button#play');
const downloadButton = document.querySelector('button#download');


recordButton.addEventListener('click', () => {
  if (recordButton.textContent === 'Record') {
    startRecording();
  } else {
    stopRecording();
    recordButton.textContent = 'Record';
    playButton.disabled = false;
    downloadButton.disabled = false;
  }
});


playButton.addEventListener('click', () => {
  const superBuffer = new Blob(recordedBlobs, {type: 'video/webm'});
  recordedVideo.src = null;
  recordedVideo.srcObject = null;
  recordedVideo.src = window.URL.createObjectURL(superBuffer);
  recordedVideo.controls = true;
  recordedVideo.play();
});


downloadButton.addEventListener('click', () => {
  const blob = new Blob(recordedBlobs, {type: 'video/mp4'});
  const url = window.URL.createObjectURL(blob);
  const a = document.createElement('a');
  a.style.display = 'none';
  a.href = url;
  a.download = 'test.mp4';
  document.body.appendChild(a);
  a.click();
  setTimeout(() => {
    document.body.removeChild(a);
    window.URL.revokeObjectURL(url);
  }, 100);
});

function handleDataAvailable(event) {
  console.log('handleDataAvailable', event);
  if (event.data && event.data.size > 0) {
    recordedBlobs.push(event.data);
  }
}

function startRecording() {
  recordedBlobs = [];
  let options = {mimeType: 'video/webm;codecs=vp9,opus'};
  try {
    mediaRecorder = new MediaRecorder(window.stream, options);
  } catch (e) {
    console.error('Exception while creating MediaRecorder:', e);
    errorMsgElement.innerHTML = `Exception while creating MediaRecorder: ${JSON.stringify(e)}`;
    return;
  }

  console.log('Created MediaRecorder', mediaRecorder, 'with options', options);
  recordButton.textContent = 'Stop Recording';
  playButton.disabled = true;
  downloadButton.disabled = true;
  mediaRecorder.onstop = (event) => {
    console.log('Recorder stopped: ', event);
    console.log('Recorded Blobs: ', recordedBlobs);
  };
  mediaRecorder.ondataavailable = handleDataAvailable;
  mediaRecorder.start();
  console.log('MediaRecorder started', mediaRecorder);
}

function stopRecording() {
  mediaRecorder.stop();
}

function handleSuccess(stream) {
  recordButton.disabled = false;
  console.log('getUserMedia() got stream:', stream);
  window.stream = stream;

  const gumVideo = document.querySelector('video#gum');
  gumVideo.srcObject = stream;
}

async function init(constraints) {
  try {
    const stream = await navigator.mediaDevices.getUserMedia(constraints);
    handleSuccess(stream);
  } catch (e) {
    console.error('navigator.getUserMedia error:', e);
    errorMsgElement.innerHTML = `navigator.getUserMedia error:${e.toString()}`;
  }
}

document.querySelector('button#start').addEventListener('click', async () => {
  const hasEchoCancellation = document.querySelector('#echoCancellation').checked;
  const constraints = {
    audio: {
      echoCancellation: {exact: hasEchoCancellation}
    },
    video: {
      width: 1280, height: 720
    }
  };
  console.log('Using media constraints:', constraints);
  await init(constraints);
});

  </script>
</html>