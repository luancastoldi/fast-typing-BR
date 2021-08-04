<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/unsemantic-grid-responsive.css">
    <link rel="stylesheet" href="css/style.css">
    <script>
        var words = ["exótico", "acho", "melhor", "não", "vai", "ter", "aula", "hoje", "bom", "banho", "cedo", "melhor", "acento", "mulher", "viatura", "câmera", "paraíso", "pais", "país", "medo", "aguardo", "viúva", "arrumar", "congresso", "congelador", "espuma", "cabeleireiro", "maquiagem", "maquiadora", "estética", "esteticista", "malabarismo", "casa", "sótão", "enfurecido", "ferrugem", "amedrontar"];
        var like = 0;
        var deslike = -1;

        function checkEnd() {
            if (document.getElementById("btnS").innerText === "FIM") {
                console.log("ACABOU")

                document.getElementById("text").disabled = true;

            }
        }

        function checkStart() {
            if (document.getElementById("btnS").innerText === "PRESSIONE ESPAÇO") {
                startTimer()
            }
        }

        function sortWords() {
            var selectOne = words[Math.floor(Math.random() * words.length)];
            document.getElementById("squareId").value = " " + selectOne
        }

        function startClock() {
            document.getElementById("text").disabled = false;
            document.getElementById("text").value = null;
        }

        document.onkeydown = function(e) {
            if (e.keyCode == 32) {
                if (document.getElementById("text").disabled == false) {
                    checkWord()
                    startClock()
                    sortWords()
                    checkStart()
                }

            }
        };

        function checkWord() {
            var getName = document.getElementById("text").value
            var getSort = document.getElementById("squareId").value

            if (getName === getSort) {

                like = like + 1
                document.getElementById('likeH').innerHTML = "✅ " + like

            } else {

                deslike = deslike + 1
                if (deslike > 0) {
                    document.getElementById('deslikeH').innerHTML = "❌ " + deslike
                }
            }
            var pnts = like - deslike
            var feitas = like + deslike
            document.getElementById('pontuacao').innerHTML = "Pontuação Final: " + pnts
            document.getElementById('feitas').innerHTML = "Palavras: " + feitas
        }
    </script>

    <title>training here</title>
</head>

<body>
    <div class="grid-container">

     

        <div class="grid-100 square">
            <input type="text-area" disabled value="ATENÇÃO" id="squareId" class="squareStyle">
        </div>

        <div class="grid-100 keyboard">
            <input class="font-key" id="text" type="text" autocomplete="off" autofocus placeholder="Escreva aqui...">
            <input type="button" onclick="location.reload()" value="REINICIAR">
        </div>

        <div class="grid-100 btnStart">
            <h1 class="font-btn" type="text" id="btnS" disabled>PRESSIONE ESPAÇO</h1>
            <p style="text-align: center;">(para começar e para avançar a palavra)</p>
        </div>

        <div class="grid-100 ">

            <h1 id="likeH"></h1>
            <h1 id="deslikeH"></h1>
            <h1 id="feitas"></h1>
            <h1 id="pontuacao"></h1>

        </div>

        <div class="grid-100 title">
            <h1>Teste de Digitação Rápida  / 15 segundos</h1>
            <h1>by Luan Castoldi</h1>
        </div>


    </div>
</body>

</html>

<script>
    var count = 16;
    var tempo = document.getElementById("btnS");

    function startTimer() {

        if (count > 0) {
            count -= 1;
            if (count == 0) {
                count = "FIM";
                tempo.classList.add("actualizado");

            } else if (count < 10) {
                count = "0" + count;
            }
            tempo.innerHTML = count;
            checkEnd();
            setTimeout(startTimer, 1000);
        }
    }
</script>