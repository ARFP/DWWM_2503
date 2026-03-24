/* setInterval(() => {
            const colors = ['blue', 'red', 'yellow', 'chartreuse', 'orange'];
            let idx = Math.random(0,colors.length);
            idx = Math.floor(idx * colors.length);
            document.body.style.backgroundColor = colors[idx];
        }, 10000);*/


        const textUp = document.getElementById('textUp');

        const textDown = document.getElementById('textDown');

        const darkMode = document.getElementById('darkMode');

        const textChange = document.getElementById('textChange');

        let justeAZero = 16;

        /**
         * Augmenter la taille du texte
         */
        textUp.addEventListener('click', () => {
            justeAZero += 2;
            document.body.style.fontSize = justeAZero + 'px';
        });

        /**
         * Diminuer la taille du texte
         */
        textDown.addEventListener('click', () => {
            justeAZero -= 2;
            document.body.style.fontSize = justeAZero + 'px';
        });

        
        textChange.addEventListener('click', () => {
            document.body.classList.toggle('opendys');
        });

        
        darkMode.addEventListener('click', () => {
            document.body.classList.toggle('light');
        });