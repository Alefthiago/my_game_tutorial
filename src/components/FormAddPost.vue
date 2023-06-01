<template>
     <div class="containerFormPost">
      <p class="fs fontBold postar">Postar</p>
      <div class="addPost">
        <form @submit.prevent="addPost" class="border p-4  border rounded">
          <div class="mb-3">
            <label class="form-label fontBold">Titulo:</label>
            <input v-model="postTitle" type="text" class="form-control fontItalic" id="exampleFormControlInput1" placeholder="digite aqui...">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label fontBold">Conteudo:</label>
            <textarea v-model="postContent"  class="form-control fontItalic" rows="5" placeholder="digite aqui..."></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label fontBold">Link do video ou imagem:</label>
            <input v-model="postLink" type="text" class="form-control fontItalic" placeholder="digite aqui...">
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-secondary fontItalic">Postar</button>
          </div>
        </form>
      </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            postTitle: '',
            postContent: '',
            postLink: '',
        }
    },
    methods:{
        addPost () {
            console.log("alo");
        }        
    }
}
</script>

<style scoped>
form {
  background-color: white; /* Cor de fundo do fortmulário */
  display: flex; /* Aplica um layout flexível como vertical */
  flex-direction: column; /* Define a direção do layout flexível como vertical */
  width: 39vw; /* Define a largura do formulário */
  height: 550px; /* Define a altura do formulário */
  margin-bottom: 65px; /* Adiciona uma margem ao formulário, criando um espaçamento */
  padding: 25px; /* Define um preenchimento interno ao redor do conteúdo do formulário */
  font-size: 1.3rem; /* Define o tamando da fonte de texto */  

}
.postar {
  font-size: 5rem;
}
.containerFormPost {
  display: flex; /* Essa propriedade define o elemento como um container flexível */
  flex-direction: column; /*  Essa propriedade define a direção principal do layout flexível como uma coluna */
  justify-content: center; /* Essa propriedade alinha os itens verticalmente no centro do container flexível */
  align-items: center; /* Essa propriedade alinha os itens horizontalmente no centro do container flexível */
  width: 80vw; /* Essa propriedade define a largura do elemento */
  height: auto; /* Essa propriedade define a altura do elemento como automática */
  margin-left: 10vh; /* Essa propriedade define a margem esquerda do elemento */
  border-bottom: 1px solid #A09B8C; /* Essa propriedade define uma borda inferior */
  
}
.fontItalic{
  border: 0;
  border-bottom: 2px solid rgb(200, 200, 200);
  outline: 0;
}   

label{
  color: black;
}
button {
  font-size: 2rem;
  width: 12vw;
  border-radius: 55px;
  margin-top: 25px; 
  background-color: #00BFFF;
 }

 

</style>