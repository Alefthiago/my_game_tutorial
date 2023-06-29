<template>
  <div class="containerFormPost">
    <div class="addPost">
      <form @submit.prevent="addPost">
        <div class="mb-3">
          <label class="form-label fontBold">Título:</label>
          <input v-model="postTitle" type="text" class="form-control fontItalic" placeholder="Digite aqui...">
        </div>
        <div class="mb-3">
          <label for="FormControlTextarea1" class="form-label fontBold">Conteúdo:</label>
          <textarea v-model="postContent" class="form-control fontItalic" rows="5" placeholder="Digite aqui..."></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label fontBold">Upload de imagem ou vídeo:</label>
          <input type="file" ref="fileInput" @change="handleFileUpload" accept="image/*, video/*">
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-secondary fontItalic">Postar</button>
        </div>
      </form>
    </div>
  </div>
  <img v-if="selectedFileUrl" :src="selectedFileUrl" alt="Imagem ou vídeo selecionado">
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      postTitle: '',
      postContent: '',
      selectedFile: null,
      selectedFileUrl: ''
    }
  },
  methods: {
    addPost() {
      // Crie um objeto FormData para enviar os dados do formulário, incluindo o arquivo
      const formData = new FormData();
      formData.append('token', localStorage.getItem('auth-token'));
      formData.append('title', this.postTitle);
      formData.append('content', this.postContent);
      formData.append('file', this.selectedFile);
      // Use axios para fazer a solicitação POST para o arquivo PHP no servidor
      axios.post('http://localhost:9090/post/addPost.php', formData)
        .then((response) => {
          console.log(response);
          // Faça o que quiser com a resposta do servidor
        })
        .catch((error) => {
          console.log(error);
        });
    },
    handleFileUpload(event) {
      this.selectedFile = event.target.files[0];
    }
  }
}
</script>
<style scoped>

form {
  background-image: linear-gradient(-45deg, #0f0f0fd8, #0f0f0f, #0f0f0f, #0f0f0f); /* Cor de fundo do fortmulário */
  display: flex; /* Aplica um layout flexível como vertical */
  flex-direction: column; /* Define a direção do layout flexível como vertical */
  width: 30vw; /* Define a largura do formulário */
  height: 50vh; /* Define a altura do formulário */
  padding: 25px; /* Define um preenchimento interno ao redor do conteúdo do formulário */
  font-size: 1.3rem; /* Define o tamando da fonte de texto */  
  margin-bottom: 2vh;
  margin-top: 2vh;
  border-radius: 50px;
}


.containerFormPost {
  display: flex; /* Essa propriedade define o elemento como um container flexível */
  flex-direction: column; /*  Essa propriedade define a direção principal do layout flexível como uma coluna */
  justify-content: center; /* Essa propriedade alinha os itens verticalmente no centro do container flexível */
  align-items: center; /* Essa propriedade alinha os itens horizontalmente no centro do container flexível */
  width: 80vw; /* Essa propriedade define a largura do elemento */
  height: auto; /* Essa propriedade define a altura do elemento como automática */
  border-bottom: 1px solid #A09B8C; /* Essa propriedade define uma borda inferior */
  
  
}
.fontItalic{
  border: 0;
  outline: 0; 
  background-color:  rgba(51, 51, 51, 0.5);
  color: white;
  width: 25vw;
  margin-left: auto;
  margin-right: auto;
  border-radius: 1vw;
  display: block;
}   

input::placeholder {
  color: white;

}

textarea::placeholder{
  color: white;
}

button[type="submit"]{
  font-size: 1.2rem;
  width: 6vw;
  border-radius: 2vw;
  margin-top: 1vw; 
 }


 

</style>