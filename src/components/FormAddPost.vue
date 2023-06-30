<template>
  <div v-if="error" class="alert alert-danger" role="alert">
    {{ errorMessage }}
  </div>
  <div class="containerFormPost">
    <div class="addPost">
      <form @submit.prevent="addPost">
        <div class="mb-3">
          <label class="form-label fontBold">Tópico</label>
          <select v-model="postTopic" class="form-control fontItalic" required>
            <option value="">Selecione uma opção</option>
            <option v-for="option in titleOptions" :value="option" :key="option">{{ option }}</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="FormControlTextarea1" class="form-label fontBold">Conteúdo:</label>
          <textarea v-model="postContent" class="form-control fontItalic" rows="5" placeholder="Digite aqui..." required></textarea>
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
import Swal from 'sweetalert2';

export default {
  data() {
    return {
      postTopic: '',
      postContent: '',
      selectedFile: null,
      titleOptions: ['League of Legends', 'valorant', 'Counter Strike Global Offensive', 'teamfight tactics']
    }
  },
  methods: {
    addPost() {
      const formData = new FormData();
      formData.append('token', localStorage.getItem('auth-token'));
      formData.append('tag', this.postTopic);
      formData.append('content', this.postContent);
      formData.append('file', this.selectedFile);
      axios.post('http://localhost:9090/post/addPost.php', formData)
        .then((response) => {
          if (response.data == "Conteúdo proibido encontrado!") {
            Swal.fire({
              icon: 'error',
              title: response.data
            })
          } else {
            // Limpar o formulário após o envio bem-sucedido
            this.postTopic = '';
            this.postContent = '';
            this.selectedFile = null;
            this.$refs.fileInput.value = null; // Limpar o campo de upload de arquivo
            location.reload();
          }
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
  background-image: linear-gradient(-45deg, #0f0f0fd8, #0f0f0f, #0f0f0f, #0f0f0f);
  display: flex;
  flex-direction: column;
  width: 30vw;
  height: 50vh;
  padding: 25px;
  font-size: 1.3rem;
  margin-bottom: 2vh;
  margin-top: 2vh;
  border-radius: 50px;
}

.containerFormPost {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 80vw;
  height: auto;
  border-bottom: 1px solid #A09B8C;
}

.fontItalic {
  border: 0;
  outline: 0;
  background-color: rgba(51, 51, 51, 0.5);
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

textarea::placeholder {
  color: white;
}

button[type="submit"],
button[type="button"] {
  font-size: 1.2rem;
  width: 25vw;
  border-radius: 1vw;
  margin-top: 1vw;
}
</style>
