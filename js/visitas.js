(() => {

    document.addEventListener("DOMContentLoaded", async () => {
        try {
            const url = "http://localhost/NewsWebBlog-Mexicanadas/php/registrarVisitas.php";
            const payload = {
                pagina: document.title,
                url: window.location.href,
            };
            const respuestaRaw = await fetch(url, {
                method: "POST",
                body: JSON.stringify(payload),
            });
            const respuesta = await respuestaRaw.json();
            if (!respuesta) {
                console.log("Error registrando visita");
            }
        } catch (e) {
            console.log("Error registrando visita: " + e);
        }
    });
})();