<!DOCTYPE html>
<html>
<head>
    <title>Web Worker Demo</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Ordenamiento con Web Worker</h1>

    <p><button onclick="startWorker()">Iniciar cálculo</button></p>

    <p id="status">Esperando acción...</p>
    <p><strong>Primeros 50 números ordenados:</strong></p>
    <pre id="output"></pre>

    <script>
        let worker;

        function generateRandomNumbers(count) {
            const nums = [];
            for (let i = 0; i < count; i++) {
                nums.push(Math.floor(Math.random() * 1000000));
            }
            return nums;
        }

        function startWorker() {
            document.getElementById('status').textContent = "Calculando...";

            try {
                if (typeof(Worker) === "undefined") {
                    throw new Error("Tu navegador no soporta Web Workers.");
                }

                worker = new Worker("/js/workers.js");

                const numbers = generateRandomNumbers(100000);

                worker.postMessage(numbers);

                worker.onmessage = function (e) {
                    if (e.data.error) {
                        throw new Error(e.data.error);
                    }

                    const sorted = e.data.slice(0, 50);
                    document.getElementById('output').textContent = JSON.stringify(sorted, null, 2);
                    document.getElementById('status').textContent = "¡Cálculo completado!";
                };

                worker.onerror = function (e) {
                    console.error("Error en el worker:", e.message);
                    document.getElementById('status').textContent = "Error en el worker: " + e.message;
                };
            } catch (err) {
                console.error("Error:", err);
                document.getElementById('status').textContent = "Error: " + err.message;
            }
        }
    </script>
</body>
</html>