<template>
  <div class="container">
    <p class=" titleComponent fs fontBold">Postagens</p>
  </div>
</template>

<script>
export default {

}
</script>

<style scoped>
.container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 80vw;
  height: auto;
  border-bottom: 1px solid #A09B8C;
}
.fs {
  font-size: 5em;
}
.titleComponent {
  width: 80vw;
  min-height: 100px;
  display: flex;
  padding: 50px;
  font-size: 5rem;
  text-shadow: 5px 5px 10px black;
  border-bottom: 1px solid #A09B8C;
}
</style>