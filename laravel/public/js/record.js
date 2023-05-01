document.addEventListener('DOMContentLoaded', () => {
    const startRecordingButton = document.getElementById('startRecording');
    const stopRecordingButton = document.getElementById('stopRecording');
    const audioPlayer = document.getElementById('audioPlayer');
    const audioFileInput = document.getElementById('audioFile');
    const submitButton = document.getElementById('submit');
    const searchForm = document.getElementById('searchForm');

    let mediaRecorder;
    let recordedChunks = [];
    let isRecording = false;

    startRecordingButton.addEventListener('click', async () => {
      if (!isRecording) {
        try {
          const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
          mediaRecorder = new MediaRecorder(stream);

          mediaRecorder.addEventListener('dataavailable', (event) => {
            if (event.data.size > 0) {
              recordedChunks.push(event.data);
            }
          });

          mediaRecorder.addEventListener('stop', () => {
            const blob = new Blob(recordedChunks, { type: 'audio/wav' });
            const url = URL.createObjectURL(blob);
            audioPlayer.src = url;

            // Use DataTransfer to create a FileList
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(new File([blob], 'audio.wav'));
            audioFileInput.files = dataTransfer.files;

            submitButton.disabled = false;
          });

          mediaRecorder.start();
          startRecordingButton.textContent = 'End Recording';
          isRecording = true;
        } catch (error) {
          console.error('Error accessing the microphone:', error);
        }
      } else {
        mediaRecorder.stop();
        startRecordingButton.textContent = 'Start New Recording';
        isRecording = false;
      }
    });

    stopRecordingButton.addEventListener('click', () => {
      mediaRecorder.stop();
      startRecordingButton.disabled = false;
      stopRecordingButton.disabled = true;
    });
  });


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

