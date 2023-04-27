const toggle = document.querySelector("#toggle");


toggle.addEventListener("click",()=>{
    if(document.body.classList.contains("light")){
        document.body.classList.replace("light","dark");
    }else{
        document.body.classList.replace("dark","light");
    }
})
const agendamentosLink = document.getElementById("agendamentos-link");
const carrosLink = document.getElementById("carros-link");
const agendamentosContainer = document.getElementById("agendamentos-container");
const carrosContainer = document.getElementById("carros-container");
const motosContainer = document.getElementById("motos-container");
const motosLink = document.getElementById("motos-link")

agendamentosContainer.innerHTML = "";
// Define a ação do link de agendamentos
agendamentosLink.addEventListener("click", (event) => {
  event.preventDefault(); // previne o comportamento padrão do link
  agendamentosLink.classList.add("active");
  carrosLink.classList.remove("active");
  // Faz a requisição para o script PHP e atualiza a div de agendamentos
  fetch("get_agendamentos.php")
    .then((response) => response.text())
    .then((result) => {
      carrosContainer.style.display = "none";
      agendamentosContainer.style.display = "block";
      agendamentosContainer.innerHTML = result;
    })
    .catch((error) => console.error(error));
});


// 1


carrosContainer.innerHTML = "";
// Define a ação do link de agendamentos
carrosLink.addEventListener("click", (event) => {
  event.preventDefault(); // previne o comportamento padrão do link
  carrosLink.classList.add("active");
  agendamentosLink.classList.remove("active");
  // Faz a requisição para o script PHP e atualiza a div de agendamentos
  fetch("get_carros.php")
    .then((response) => response.text())
    .then((result) => {
      agendamentosContainer.style.display = "none";
      carrosContainer.style.display = "block";
      
      carrosContainer.innerHTML = result;
    })
    .catch((error) => console.error(error));
});

// 2

motosContainer.innerHTML = "";
// Define a ação do link de agendamentos
motosLink.addEventListener("click", (event) => {
  event.preventDefault(); // previne o comportamento padrão do link
  motosLink.classList.add("active");
  agendamentosLink.classList.remove("active");
  // Faz a requisição para o script PHP e atualiza a div de agendamentos
  fetch("get_motos.php")
    .then((response) => response.text())
    .then((result) => {
      agendamentosContainer.style.display = "none";
      carrosContainer.style.display = "block";
      
      carrosContainer.innerHTML = result;
    })
    .catch((error) => console.error(error));
});



// selecionando o botão "Ver mensagem"
const btnVerMensagem = document.querySelector('#btn-ver-mensagem');

// adicionando um ouvinte de evento para quando o botão for clicado
btnVerMensagem.addEventListener('click', function() {
  // fazendo a solicitação AJAX
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'buscardescricao.php');
  xhr.onload = function() {
    if (xhr.status === 200) {
      // exibindo o conteúdo retornado em um modal
      const modal = document.createElement('div');
      modal.classList.add('modal');
      const modalContent = document.createElement('div');
      modalContent.classList.add('modal-content');
      modalContent.textContent = xhr.responseText;
      const modalClose = document.createElement('span');
      modalClose.classList.add('close');
      modalClose.innerHTML = '&times;';
      modalClose.addEventListener('click', function() {
        modal.style.display = 'none';
      });
      modalContent.appendChild(modalClose);
      modal.appendChild(modalContent);
      document.body.appendChild(modal);
      modal.style.display = 'block';
    } else {
      alert('Erro ao buscar a mensagem.');
    }
  };
  xhr.send();
});

