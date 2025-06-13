const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
const colorPicker = document.getElementById('color');
const sizePicker = document.getElementById('size');
let dibujando = false;
let colorActual = '#000000';
let grosorActual = 2;
let modoBorrador = false;

// Detectar inicio y fin de dibujo
canvas.addEventListener('mousedown', () => dibujando = true);
canvas.addEventListener('mouseup', () => dibujando = false);
canvas.addEventListener('mouseout', () => dibujando = false);

// Dibujo
canvas.addEventListener('mousemove', (e) => {
  if (!dibujando) return;
  const rect = canvas.getBoundingClientRect();
  const x = e.clientX - rect.left;
  const y = e.clientY - rect.top;

  ctx.fillStyle = modoBorrador ? '#fff' : colorActual;
  ctx.beginPath();
  ctx.arc(x, y, grosorActual, 0, Math.PI * 2);
  ctx.fill();
});

// Cambiar color
colorPicker.addEventListener('input', (e) => {
  colorActual = e.target.value;
  modoBorrador = false;
});

// Cambiar tamaño
sizePicker.addEventListener('input', (e) => {
  grosorActual = parseInt(e.target.value);
});

// Borrar
document.getElementById('borrador').addEventListener('click', () => {
  modoBorrador = true;
});

// Limpiar todo
document.getElementById('limpiar').addEventListener('click', () => {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
});

// Guardar imagen
document.getElementById('guardar').addEventListener('click', () => {
  const enlace = document.createElement('a');
  enlace.download = 'mi_dibujo.png';
  enlace.href = canvas.toDataURL();
  enlace.click();
});
