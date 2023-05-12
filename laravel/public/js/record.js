// async function submitForm(event) {
//     event.preventDefault();

//     const formData = new FormData();
//     formData.append('audio', hiddenFileInput.customFiles[0]);

//     try {
//       const response = await fetch('/transcription', {
//         method: 'POST',
//         body: formData,
//       });

//       if (response.ok) {
//         const data = await response.json();
//         console.log('Transcription:', data.transcription);

//         // Update the transcriptionResult element with the transcription
//         const transcriptionResult = document.getElementById('transcriptionResult');
//         if (transcriptionResult) {
//           transcriptionResult.textContent = data.transcription;
//         }
//       } else {
//         console.error('Error submitting the form:', response.statusText);
//       }
//     } catch (error) {
//       console.error('Error submitting the form:', error);
//     }
//   }










const startRecordingBtn = document.getElementById("startRecording");
const stopRecordingBtn = document.getElementById("stopRecording");
const submitBtn = document.getElementById("submit");
const audioPlayer = document.getElementById("audioPlayer");
const audioFileInput = document.getElementById("audioFile");
const form = document.querySelector('form');

let mediaRecorder;

startRecordingBtn.addEventListener("click", startRecording);
stopRecordingBtn.addEventListener("click", stopRecording);
form.addEventListener("submit", submitForm);

async function startRecording() {
  const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
  mediaRecorder = RecordRTC(stream, { type: 'audio', mimeType: 'audio/wav' });

  mediaRecorder.startRecording();
  startRecordingBtn.disabled = true;
  stopRecordingBtn.disabled = false;
}

function stopRecording() {
  if (mediaRecorder) {
    mediaRecorder.stopRecording(() => {
      const blob = mediaRecorder.getBlob();
      const url = URL.createObjectURL(blob);
      audioPlayer.src = url;
      audioFileInput.files = new FileList([new File([blob], "audio.wav", { type: "audio/wav" })]);
      submitBtn.disabled = false;

      startRecordingBtn.disabled = false;
      stopRecordingBtn.disabled = true;
    });
  }
}

async function submitForm(event) {
  event.preventDefault();

  const formData = new FormData(form);
  try {
    const response = await fetch('/transcription', {
      method: 'POST',
      body: formData,
    });

    if (response.ok) {
      const data = await response.json();
      console.log('Transcription:', data.transcription);
      // Do something with the transcription
    } else {
      console.error('Error submitting the form:', response.statusText);
    }
  } catch (error) {
    console.error('Error submitting the form:', error);
  }
}





// const startRecordingBtn = document.getElementById("startRecording");
// const stopRecordingBtn = document.getElementById("stopRecording");
// const submitBtn = document.getElementById("submit");
// const audioPlayer = document.getElementById("audioPlayer");
// const audioFileInput = document.getElementById("audioFile");

// let mediaRecorder;
// let recordedChunks = [];

// startRecordingBtn.addEventListener("click", startRecording);
// stopRecordingBtn.addEventListener("click", stopRecording);

// async function startRecording() {
//   const stream = await navigator.mediaDevices.getUserMedia({ audio: true });

//   mediaRecorder = new MediaRecorder(stream);
//   mediaRecorder.addEventListener("dataavailable", (event) => {
//     if (event.data.size > 0) {
//       recordedChunks.push(event.data);
//     }
//   });

//   mediaRecorder.addEventListener("stop", () => {
//     const blob = new Blob(recordedChunks, { type: "audio/wav" });
//     const url = URL.createObjectURL(blob);
//     audioPlayer.src = url;
//     audioFileInput.files = new FileList([new File([blob], "audio.wav", { type: "audio/wav" })]);
//   });

//   mediaRecorder.start();
//   startRecordingBtn.disabled = true;
//   stopRecordingBtn.disabled = false;
//   submitBtn.disabled = true;
// }

// function stopRecording() {
//   if (mediaRecorder && mediaRecorder.state === "recording") {
//     mediaRecorder.stop();
//     startRecordingBtn.disabled = false;
//     stopRecordingBtn.disabled = true;
//     submitBtn.disabled = false;
//   }
// }



// let isRecording = false;

// function setFiles(inputElement, filesArray) {
//   const dataTransfer = new DataTransfer();
//   filesArray.forEach((file) => {
//     dataTransfer.items.add(file);
//   });
//   inputElement.files = dataTransfer.files;
// }

// startRecordingButton.addEventListener('click', async () => {
//   if (!isRecording) {
//     try {
//       const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
//       mediaRecorder = new MediaRecorder(stream);

//       mediaRecorder.addEventListener('dataavailable', (event) => {
//         if (event.data.size > 0) {
//           recordedChunks.push(event.data);
//         }
//       });

//       mediaRecorder.addEventListener('stop', () => {
//         const blob = new Blob(recordedChunks, { type: 'audio/wav' });
//         const url = URL.createObjectURL(blob);
//         audioPlayer.src = url;
//         setFiles(audioFileInput, [new File([blob], 'audio.wav')]);
//         submitButton.disabled = false;
//       });

//       mediaRecorder.start();
//       startRecordingButton.textContent = 'End Recording';
//       isRecording = true;
//     } catch (error) {
//       console.error('Error accessing the microphone:', error);
//     }
//   } else {
//     mediaRecorder.stop();
//     startRecordingButton.textContent = 'Start New Recording';
//     isRecording = false;
//   }
// });

// stopRecordingButton.addEventListener('click', () => {
//   mediaRecorder.stop();
//   startRecordingButton.disabled = false;
//   stopRecordingButton.disabled = true;
// });

// // Add this event listener for the submit button
// submitButton.addEventListener('click', async (event) => {
//   event.preventDefault();

//   const formData = new FormData();
//   formData.append('audio', audioFileInput.files[0]);
//   formData.append('_token', document.querySelector('input[name="_token"]').value);

//   try {
//     const response = await fetch('/transcription', {
//       method: 'POST',
//       body: formData,
//     });

//     if (response.ok) {
//       const data = await response.json();
//       const searchBar = document.querySelector('input[name="search"]');
//       searchBar.value = data.transcription;

//       // Submit the search form
//       searchForm.submit();
//     } else {
//       console.error('Error submitting the form:', response.statusText);
//     }
//   } catch (error) {
//     console.error('Error submitting the form:', error);
//   }
// });




















// const startRecordingButton = document.getElementById('startRecording');
// const stopRecordingButton = document.getElementById('stopRecording');
// const audioPlayer = document.getElementById('audioPlayer');
// const audioFileInput = document.getElementById('audioFile');
// const submitButton = document.getElementById('submit');

// let mediaRecorder;
// let recordedChunks = [];

// startRecordingButton.addEventListener('click', async () => {
//     const stream = await navigator.mediaDevices.getUserMedia({ audio: true });

//     if (MediaRecorder.isTypeSupported('audio/mpeg')) {
//         mediaRecorder = new MediaRecorder(stream, { mimeType: 'audio/mpeg' });
//     } else {
//         console.error('MP3 recording is not supported in this browser.');
//         return;
//     }

//     mediaRecorder.addEventListener('dataavailable', (event) => {
//         if (event.data.size > 0) {
//             recordedChunks.push(event.data);
//         }
//     });

//     mediaRecorder.addEventListener('stop', () => {
//         const blob = new Blob(recordedChunks, { type: 'audio/mpeg' });
//         const url = URL.createObjectURL(blob);
//         audioPlayer.src = url;
//         audioFileInput.files = new FileList([new File([blob], 'audio.mp3')]);
//         submitButton.disabled = false;
//     });

//     mediaRecorder.start();
//     startRecordingButton.disabled = true;
//     stopRecordingButton.disabled = false;
// });

// stopRecordingButton.addEventListener('click', () => {
//     mediaRecorder.stop();
//     startRecordingButton.disabled = false;
//     stopRecordingButton.disabled = true;
// });

// const mediaSelector = document.getElementById("media");
// const webCamContainer = document.getElementById('web-cam-container');
// const startRecordingButton = document.getElementById('startRecording');
// const stopRecordingButton = document.getElementById('stopRecording');
// const audioPlayer = document.getElementById('audioPlayer');
// const audioFileInput = document.getElementById('audioFile');
// const hiddenFileInput = document.getElementById('hiddenFileInput');
// const submitButton = document.getElementById('submit');

// let selectedMedia = null;
// let mediaRecorder;
// let recordedChunks = [];

// const audioMediaConstraints = {
//   audio: true,
//   video: false
// };

// const videoMediaConstraints = {
//   audio: true,
//   video: true
// };

// mediaSelector.addEventListener('change', (event) => {
//   selectedMedia = event.target.value;
// });

// function createCustomFileList(file) {
//   return {
//     0: file,
//     length: 1,
//     item: (index) => file,
//     [Symbol.iterator]: function* () {
//       yield file;
//     },
//   };
// }

// function startRecording() {
//   if (!selectedMedia) {
//     alert('Please select a media type');
//     return;
//   }

//   navigator.mediaDevices.getUserMedia(
//       selectedMedia === "vid" ?
//       videoMediaConstraints :
//       audioMediaConstraints)
//     .then(mediaStream => {
//       window.mediaStream = mediaStream;

//       if (selectedMedia === 'vid') {
//         webCamContainer.srcObject = mediaStream;
//       } else {
//         let mimeType;
//         if (MediaRecorder.isTypeSupported('audio/wav')) {
//           mimeType = 'audio/wav';
//         } else if (MediaRecorder.isTypeSupported('audio/webm')) {
//           mimeType = 'audio/webm';
//         } else {
//           console.error('WAV and WebM recording are not supported in this browser.');
//           return;
//         }

//         mediaRecorder = new MediaRecorder(mediaStream, { mimeType });

//         mediaRecorder.addEventListener('dataavailable', (event) => {
//           if (event.data.size > 0) {
//             recordedChunks.push(event.data);
//           }
//         });

//         mediaRecorder.addEventListener('stop', () => {
//           const blob = new Blob(recordedChunks, { type: mimeType });
//           const url = URL.createObjectURL(blob);
//           audioPlayer.src = url;
//           const fileExtension = mimeType === 'audio/wav' ? 'wav' : 'webm';
//           hiddenFileInput.customFiles = createCustomFileList(new File([blob], `audio.\${fileExtension}`));
//           submitButton.disabled = false;
//         });

//         mediaRecorder.start();
//       }

//       startRecordingButton.disabled = true;
//       stopRecordingButton.disabled = false;
//     });
// }

// function stopRecording() {
//   if (selectedMedia === 'vid') {
//     window.mediaStream.getTracks().forEach(track => track.stop());
//   } else {
//     mediaRecorder.stop();
//   }

//   startRecordingButton.disabled = false;
//   stopRecordingButton.disabled = true;
// }

// startRecordingButton.addEventListener('click', startRecording);
// stopRecordingButton.addEventListener('click', stopRecording);

// // Update the submitForm function
// async function submitForm(event) {
//   event.preventDefault();

//   const formData = new FormData();
//   formData.append('audio', hiddenFileInput.customFiles[0]);

//   try {
//     const response = await fetch('/transcription', {
//       method: 'POST',
//       body: formData,
//     });

//     if (response.ok) {
//       const data = await response.json();
//       console.log('Transcription:', data.transcription);
//       // Do something with the transcription
//     } else {
//       console.error('Error submitting the form:', response.statusText);
//     }
//   } catch (error) {
//     console.error('Error submitting the form:', error);
//   }
// }

