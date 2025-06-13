document.addEventListener('DOMContentLoaded', () => {
  const video = document.getElementById('video');
  const canvas = document.getElementById('photo-canvas');
  const photoPreview = document.getElementById('photo-preview');
  const captureBtn = document.getElementById('capture-btn');
  const downloadLink = document.getElementById('download-link');
  const startCameraBtn = document.getElementById('start-camera');
  const stopCameraBtn = document.getElementById('stop-camera');
  const retakeBtn = document.getElementById('retake-btn');

  let stream = null;

  async function startCamera() {
    try {
      stream = await navigator.mediaDevices.getUserMedia({ video: true });
      video.srcObject = stream;
      startCameraBtn.disabled = true;
      stopCameraBtn.disabled = false;
      captureBtn.disabled = false;
    } catch (error) {
      alert('No se pudo acceder a la cámara: ' + error.message);
    }
  }

  function stopCamera() {
    if (stream) {
      stream.getTracks().forEach(track => track.stop());
      stream = null;
    }
    video.srcObject = null;
    startCameraBtn.disabled = false;
    stopCameraBtn.disabled = true;
    captureBtn.disabled = true;
  }

  captureBtn.addEventListener('click', () => {
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    const ctx = canvas.getContext('2d');
    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

    const imageData = canvas.toDataURL('image/jpeg');
    photoPreview.src = imageData;
    photoPreview.style.display = 'block';
    canvas.style.display = 'none';
    downloadLink.href = imageData;
    downloadLink.download = 'foto.jpg';
    downloadLink.style.display = 'inline';
    retakeBtn.style.display = 'inline';

    // Pausar video mientras está la foto
    video.style.display = 'none';
  });

  retakeBtn.addEventListener('click', () => {
    photoPreview.style.display = 'none';
    downloadLink.style.display = 'none';
    retakeBtn.style.display = 'none';
    video.style.display = 'block';
  });

  startCameraBtn.addEventListener('click', startCamera);
  stopCameraBtn.addEventListener('click', stopCamera);
});

