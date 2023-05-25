<template>
     <div class="containerFormPost">
      <p class="fs fontBold postar">Postar</p>
      <div class="addPost">
        <form @submit.prevent="addPost" class="border p-4  border rounded">
          <div class="mb-3">
            <label class="form-label fontBold">Titulo:</label>
            <input v-model="postTitle" type="text" class="form-control fontItalic" id="exampleFormControlInput1">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label fontBold">Conteudo:</label>
            <textarea v-model="postContent"  class="form-control fontItalic" rows="5"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label fontBold">Link do video ou imagem:</label>
            <input v-model="postLink" type="text" class="form-control fontItalic">
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
  background-color: #091428;
  display: flex;
  flex-direction: column;
  width: 30vw;
  height: 450px;
  margin-bottom: 40px;
  padding: 25px;
}
.postar {
  font-size: 5rem;
}
.containerFormPost {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 80vw;
  height: auto;
  margin-left: 10vh;
  border-bottom: 1px solid #A09B8C;
}

</style>