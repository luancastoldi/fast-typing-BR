<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/unsemantic-grid-responsive.css">
    <link rel="stylesheet" href="css/style.css">
    <script>

        //0 setando variaveis
        var frases = ["exótico", "acho", "melhor", "não", "vai", "ter", "aula", "hoje", "bom", "banho", "cedo", "melhor", "acento", "mulher", "viatura", "câmera", "paraíso", "pais", "país", "medo", "aguardo", "viúva", "arrumar", "congresso", "congelador", "espuma", "cabeleireiro", "maquiagem", "maquiadora", "estética", "esteticista", "malabarismo", "casa", "sótão", "enfurecido", "ferrugem", "amedrontar"];
        var like = 0;
        var deslike = -1;
        var firstIndex = []
        var selectOne = []
        var getShuffle

        //1 verifica se a tecla "espaço" foi clicada"
        document.onkeydown = function(e) {
            if (e.keyCode == 32) {
                if (document.getElementById("text").disabled == false) {
                    checkStart()
                    checkFrases()
                    openText()
                }
            }
        };

        //2 verifica se o texto é igual ao "PRESSIONE ESPAÇO"
        function checkStart() {
            if (document.getElementById("btnS").innerText === "PRESSIONE ESPAÇO") {
                startTimer()
                sortFrases()
            }
        }

        //3 checa se a palavra digita é igual a primeira palavra da array
        function checkFrases() {

            var getSort = document.getElementById("squareId").value
            var getName = document.getElementById("text").value

            if (getName === firstIndex) {

               
                like = like + 1
                document.getElementById('likeH').innerHTML = "✅ " + like
                setNewArray()
                
            } else {
                deslike = deslike + 1
                if (deslike > 0) {
                    document.getElementById('deslikeH').innerHTML = "❌ " + deslike
                }
            }
            var pnts = like - deslike
            var feitas = like + deslike
            document.getElementById('pontuacao').innerHTML = "Pontuação: " + pnts
            document.getElementById('feitas').innerHTML = "Palavras: " + feitas
        }
        //4 abre as caixas de texto
        function openText() {
            document.getElementById("text").disabled = false;
            document.getElementById("text").value = null;
        }

        //5 enviar as frase aleatorias separaras por " " 
        function sortFrases() { //faz esse codigo apenas uma vez
            getShuffle = frases.sort(() => Math.random() - 0.5)
            firstIndex = " " + getShuffle[0]
            selectOne = getShuffle.join(" ");
            document.getElementById("squareId").value = selectOne
        }

        //6 após acertar um nova array é adicionada
        function setNewArray() {
            getShuffle.shift() // remove o primeiro item da array
            console.log(getShuffle) 
            firstIndex = " " + getShuffle[0]
            selectOne = getShuffle.join(" ");
            document.getElementById("squareId").value = selectOne

        }
        //7 checa se o timer acabou === FIM  e desabilita a caixa de texto
        function checkEnd() {
            if (document.getElementById("btnS").innerText === "FIM") {
                document.getElementById("text").disabled = true;
            }
        }
    </script>

    <title>Digitação Rápida ⏰</title>
</head>

<body>
    <div class="grid-container">

        <div class="grid-100 square">
            <input type="text-area" disabled value="Preparado ?" id="squareId" class="squareStyle">
        </div>

        <div class="grid-100 keyboard">
            <input class="font-key" id="text" type="text" autocomplete="off" autofocus>
            <img src="images/restart.png" class="imgClick" alt="restart" onclick="location.reload()">
        </div>

        <div class="grid-100 btnStart">
            <h1 class="font-btn" type="text" id="btnS" disabled>PRESSIONE ESPAÇO</h1>
            <p style="text-align: center;">(para começar e para enviar a palavra)</p>
        </div>

        <div class="grid-100 pnts">

            <h3 id="pontuacao"></h3>
            <h1 id="likeH"></h1>
            <h1 id="deslikeH"></h1>
            <h1 id="feitas"></h1>


        </div>

        <div class="grid-100 title">
            <h1>Teste de Digitação Rápida / 15 segundos</h1>
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