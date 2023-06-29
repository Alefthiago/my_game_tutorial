<template>
     <div class="containerFormPost">
      <div class="addPost">
        <form @submit.prevent="addPost" >
          <div class="mb-3">
            <label class="form-label fontBold">Titulo:</label>
            <input v-model="postTitle" type="text" class="form-control fontItalic" id="exampleFormControlInput1" placeholder="digite aqui...">
          </div>
          <div class="mb-3">
            <label for="FormControlTextarea1" class="form-label fontBold">Conteudo:</label>
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
  background-image: linear-gradient(-45deg, #0f0f0fd8, #0f0f0f, #0f0f0f, #0f0f0f); /* Cor de fundo do fortmulário */
  display: flex; /* Aplica um layout flexível como vertical */
  flex-direction: column; /* Define a direção do layout flexível como vertical */
  width: 30vw; /* Define a largura do formulário */
  height: 470px; /* Define a altura do formulário */
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
  width: 530px;
  margin-left: auto;
  margin-right: auto;
  border-radius: 30px;
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
  border-radius: 55px;
  margin-top: 5px; 
 }


 

</style>