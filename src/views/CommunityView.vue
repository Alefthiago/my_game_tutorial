<template>
    <div class="container">
      <div class="titlePage"> 
        <p class="fs fontBold">Comunidade</p>
      </div>
      <div class="addPost">
        <form>
          <input type="text">
          <textarea name="" cols="30" rows="10"></textarea>
        </form>
      </div>
    </div>
</template>

<script>
export default {
  created() {
    this.$authUser();
  },
}
</script>

<style>
.container {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.titlePage {
  width: 80vw;
  min-height: 100px;
  display: flex;
  padding: 50px;
  margin-left: 10vh;
  font-size: 5rem;
  text-shadow: 5px 5px 10px black;
  border-bottom: 1px solid #A09B8C;
}
</style>