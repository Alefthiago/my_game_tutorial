<template>
        <div class="containerData">
            <div class="div">
                <form class="form">
                    <label for="">Email:</label>
                    <div>
                        <input type="text">
                    </div>
                    <button class="btn btn-secondary fontItalic">Criar</button>
                </form>
            </div>

            <div class="div">
                <form class="form">
                    <label for="">Nome :</label>
                    <div>
                        <input type="text">
                    </div>
                    <button class="btn btn-secondary fontItalic">Criar</button>
                </form>
            </div>

            <div class="div">
                <form class="form">
                    <label for="">Usuário :</label>
                    <div>
                        <input type="text">
                    </div>
                    <button class="btn btn-secondary fontItalic">Criar</button>
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
                    <button class="btn btn-secondary fontItalic">Criar</button>
                </form>
            </div>
        </div>
</template>

<script>
// import axios from 'axios';


export default {
    created () {
                
    }
}
</script>

<style scoped>
.containerData{
    margin-top: 2vh;
    min-width: 50vw;
    min-height: 65vh;
    border-radius: 10px;
    border: 1px solid #A09B8C;
    background-image: linear-gradient(to right, #091428, #0A1428);
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
}

.div {
 margin-top: 5%;
 background-color: red;
}

.form{
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
}
.btn{
    width: 10%;
}
</style>