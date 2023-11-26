<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Back-end</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="imagens/logo.png">
</head>

<body>

    <div class="form-image">
      <img src="imagens/imagem_usuario-comum.svg" alt="Erro" />

      <p class="texto-info">Você não possui um plano, entre em contato com um dos nossos atendentes</p>
    </div>


    <!-- <h1 class="plano-titulo">Plano Premium</h1>


    <div class="center">
        <div id="animatedNumber" class="animated-number">0 / 20GB</div>

        <div class="progress-container">
            <div class="progress-bar" id="myBar"></div>
        </div>
    </div>

    
    <div class="wrapper">

      <div class="container1">
        <i class="bi bi-reception-4"></i>
        <span class="num" data-val="13"></span>
        <span class="text">Internet disponível</span>
      </div>


      <div class="container1">
        <i class="bi bi-reception-4"></i>
        <span class="num" data-val="5"></span>
        <span class="text">Bônus disponível</span>
      </div>
    </div>
    
    
    <div class="preco">
        <p>Valor do plano: <a><span class="preco-vermelho">*Nossos atendentes irão entrar em contato para mais detalhes*</span></a> </p> <br>
        <p>Status: Não pago</p>
    </div> -->

    <!-- <script>
        setTimeout(function() {
        const valor = 7; // valor desejado (de 0 a 20)
        const valorMax = 20; // valor máximo permitido

        // Garanta que o valor não ultrapasse o valor máximo
        const valorMin = Math.min(valor, valorMax);

        // Calcula a largura da barra de progresso em relação ao valor máximo
        const valorBarra = (valorMin / valorMax) * 100;

        // Ajusta a propriedade da barra de progresso
        document.getElementById("myBar").style.width = `${valorBarra}%`;

        // Ajusta para aparecer os valores GB
        document.getElementById('animatedNumber').textContent = `${valor}GB / ${valorMax}GB`;
    }, 50);
    

        // Função do número animado
        function animateNumber(targetNumber, duration) {
            const element = document.getElementById('animatedNumber');
            const startNumber = parseInt(element.textContent, 10) || 0;
            const increment = (targetNumber - startNumber) / (duration / 16);
            let currentNumber = startNumber;
            
            function updateNumber() {
                currentNumber += increment;
                element.textContent = `${Math.round(currentNumber)}GB / 20GB`;

            if (currentNumber < targetNumber) {
                requestAnimationFrame(updateNumber);
            }
        }

        updateNumber();

        setTimeout(() => {
            element.style.opacity = 1;
        }, 100);
      }

        // Animação do número de 0 para o valor da progress bar em 1.75 segundos
        animateNumber(7, 1750);



        // Animação dos outros números animados
        let valueDisplays = document.querySelectorAll(".num");
        
        let intervalo = 1550;
        
        valueDisplays.forEach((valueDisplay) => {
          let valorInicial = 0;
          let valorFinal = parseInt(valueDisplay.getAttribute("data-val"));
          let valorTotal = 20; 
          let duracao = Math.floor(intervalo / valorFinal);
          let contador = setInterval(function () {
    
            valorInicial += 1;
    
            // Verifica se é o primeiro ou segundo contêiner e define o texto correspondente
            if (valorTotal === 20) {
              valueDisplay.textContent = `${Math.round(valorInicial)}GB / ${valorTotal}GB`;
            } 
            if (valorFinal === 5) {
              valueDisplay.textContent = `${Math.round(valorInicial)}GB / 5GB`;
            }
            
          if (valorInicial == valorFinal) {
            clearInterval(contador);
          }
        }, duracao);
      });
    </script> -->
</body>
</html>