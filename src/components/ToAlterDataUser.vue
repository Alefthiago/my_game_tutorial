<template>
    <div class="containerData">
        <div class="div">
            <form class="form">
                <label for="">Email:</label>
                <div>
                    <input type="text">
                </div>
                <input type="submit" value="Enviar">
            </form>
        </div>

        <div class="div">
            <form class="form">
                <label for="">Nome :</label>
                <div>
                    <input type="text">
                </div>
                <input type="submit" value="Enviar">
            </form>
        </div>

        <div class="div">
            <form class="form">
                <label for="">Usuário :</label>
                <div>
                    <input type="text">
                </div>
                <input type="submit" value="Enviar">
            </form>
        </div>

        <div class="div">
            <form class="form">
                <label for="">Senha :</label>
                <div>
                    <input type="text">
                </div>
                <label for="">Confirmar senha:</label>
                <div>
                    <input type="text">
                </div>
                <input type="submit" value="Enviar">
            </form>
        </div>
    </div>
</template>

<script>
// import axios from 'axios';


export default {
    created() {

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
    border: 1px solid #A09B8C;
    background-color: #0f0f0fb9;
    display: flex;
    flex-direction: column;
}

.div {
    margin-top: 5%;
}

.form {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 2vh;
}

input[type="submit"] {
    margin-top: 2vh;
    background-color: black;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 4px;
}

input[type="text"],
input[type="password"],
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #555;
    border-radius: 4px;
    box-sizing: border-box;
    background-color: #333;
    color: #fff;
}
</style>