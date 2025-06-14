self.onmessage = function(e) {
    try {
        const datos = e.data;
        if (!Array.isArray(datos)) throw new Error('El dato recibido no es un array');
        datos.sort(function(a, b) { return a - b; });
        self.postMessage(datos);
    } catch (err) {
        self.postMessage({error: err.message});
    }
}; 