const app = {

    init:function(){
        const alarmesPrises = document.querySelector(".alarmesPrises p");
        const alarmesLibres = document.querySelector(".alarmesLibres p");
        const infoDisplay = document.querySelector(".infoDisplay p");

    },

    main:function(){
        while (true) {
            fetch("https://www.une-url.com")
            .then(response => response.json())
            .then(response => alert(JSON.stringify(response)))
            .catch(error => alert("Erreur : " + error));
        }
    }
}
document.addEventListener('DOMContentLoaded', app.init);