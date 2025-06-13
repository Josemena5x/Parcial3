self.onmessage = function (e) {
    try {
        const numbers = e.data;
        numbers.sort((a, b) => a - b);
        self.postMessage(numbers);
    } catch (error) {
        self.postMessage({ error: error.message });
    }
};