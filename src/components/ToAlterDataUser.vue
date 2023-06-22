<template>
    <div class="containerData">
        <form class="form">
            <div class="div">
                <label>Email</label>
                <div>
                    <input type="email" required>
                </div>
                <label>Nome</label>
                <div>
                    <input type="text" required>
                </div>
                <label>Usuário</label>
                <div>
                    <input type="text" required>
                </div>
                <label>Senha</label>
                <div>
                    <input type="password" required>
                </div>
                <label>Confirmar senha</label>
                <div>
                    <input type="password" required>
                </div>
                <input type="submit" value="Alterar">
            </div>
        </form>
    </div>
</template>

<script>
// import axios from 'axios';


export default {
    data() {
        return {

        }
    },
    created() {
        this.$authUser();
    }
}
</script>

<style scoped>
.containerData {
    margin-top: 2vh;
    margin-bottom: 5vh;
    min-width: 50vw;
    min-height: 70vh;
    border-radius: 10px;
    display: flex;
    justify-content: flex-start;
    flex-direction: column;
}

.div {
    margin-top: 5%;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.form {
    padding: 10px 10px;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    margin-bottom: 2vh;
}

input[type="submit"] {
    margin-top: 1vh;
    background-color: black;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 4px;
    width: 40%;
}

input[type="text"],
input[type="email"],
input[type="password"],
textarea {
    margin-top: 2vh;
    margin-bottom: 1vh;
    padding: 10px;
    border: 1px solid #555;
    border-radius: 4px;
    box-sizing: border-box;
    background-color: #333;
    color: #fff;
}
</style>