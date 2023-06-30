<template>
    <div class="containerData">
        <form class="form">
            <div class="div">
                <label>Email</label>
                <div>
                    <input v-model="email" type="email" required>
                </div>
                <label>Nome</label>
                <div>
                    <input v-model="name" type="text" required>
                </div>
                <label>Usuário</label>
                <div>
                    <input v-model="userName" type="text" required>
                </div>
                <button type="button" class="btn" data-toggle="modal" data-target="#Modal">
                    Alterar
                </button>
            </div>
        </form>

        <div>
            <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="TituloModalCentralizado">Tem certeza em alterar seus dados?</h5>
                        </div>
                        <div class="modal-body">
                            <div v-if="!showSuccessMessage">
                                <label>Digite sua senha</label>
                                <div>
                                    <input v-model="pass" type="password" required>
                                </div>
                                <p v-if="showErrorMessage" class="error-message">Ocorreu um erro ao alterar os dados. Tente
                                    novamente.</p>
                            </div>

                            <!-- Aviso de mudança de dados -->
                            <p v-if="showSuccessMessage" class="success-message">Dados alterados com sucesso!</p>
                        </div>
                        <div class="modal-footer">
                            <button v-if="!showSuccessMessage" @click="closeModalsA" type="button" class="btn"
                                data-dismiss="modal">Cancelar</button>
                            <button v-if="showSuccessMessage" @click="closeModalsB" type="button" class="btn"
                                data-dismiss="modal">Fechar</button>
                            <button v-else @click="alterData" type="button" class="btn">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            email: '',
            userName: '',
            name: '',
            pass: '',
            token: localStorage.getItem('auth-token'),
            showSuccessMessage: false,
            showErrorMessage: false,
        }
    },
    mounted() {
        this.recoverData();
    },
    methods: {
        alterData() {
            axios
                .post('http://localhost:9090/user/updateUser.php', {
                    token: localStorage.getItem('auth-token'),
                    email: this.email,
                    name: this.name,
                    userName: this.userName,
                    pass: this.pass
                })
                .then((response) => {
                    console.log(response);
                    this.showSuccessMessage = true;
                    this.showErrorMessage = false;
                })
                .catch((error) => {
                    console.log(error);
                    this.showSuccessMessage = false;
                    this.showErrorMessage = true;
                })
                .finally(() => {
                    this.pass = '';
                });
        },
        recoverData() {
            axios
                .get('http://localhost:9090/user/recoverDataUser.php', {
                    params: {
                        token: this.token
                    }
                })
                .then((response) => {
                    let json = response.data;
                    console.log(json);
                    this.email = json.user_email;
                    this.userName = json.user_username;
                    this.name = json.user_name;
                })
                .catch((error) => {
                    alert(error);
                })
        },
        closeModalsB() {
            location.reload();
        },
        closeModalsA() {
            this.pass = '';
            this.showSuccessMessage = false;
            this.showErrorMessage = false;
        }
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
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    margin-top: 20px;
}

.form {
    background-image: linear-gradient(-45deg, #0f0f0fd8, #0f0f0f, #0f0f0f, #0f0f0f); /* Cor de fundo do fortmulário */
    padding: 10px 10px;
    width: 15vw;
    height: 43vh;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    margin-bottom: 2vh;
    border-radius: 40px;
}

.modal-content {
    background-color: black;
}

.btn {
    margin-top: 1vh;
    background-color: black;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 4px;
}

.close {
    background-color: black;
}

input[type="text"],
input[type="email"],
input[type="password"],
textarea {
    margin-top: 1.4vh;
    margin-bottom: 2vh;
    padding: 1vh;
    border: 1px solid #555;
    border-radius: 4px;
    box-sizing: border-box;
    background-color: #333;
    color: #fff;
}

.success-message {
    color: green;
    margin-top: 10px;
}

.error-message {
    color: red;
    margin-top: 10px;
}</style>
