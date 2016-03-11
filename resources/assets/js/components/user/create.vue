<template>
    <gp-modal-form 
        :show.sync="showModal"
        @show-modal-form="showModal = true"
        @modal-form-submited="createUser"
        @modal-form-closed="reset"
    >
        <div slot="header">
            Cadastrar Usuário
        </div>
        <div>
            <div 
                class="form-group"
                :class="{'has-error' : errors.name}"
            >
                <label for="name" class="control-label">Nome</label>
                <input
                    id="name"
                    type="text"
                    name="name"
                    class="form-control"
                    placeholder="Nome"
                    v-model="user.name"
                    autocomplete="off"
                    autofocus />
                <span class="text-danger">{{ errors.name }}</span>
            </div>

            <div
                class="form-group"
                :class="{'has-error' : errors.email}"
            >
                <label for="email" class="control-label">E-mail</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    class="form-control"
                    v-model="user.email"
                    autocomplete="off"
                    placeholder="E-Mail" />
                <span class="text-danger">{{ errors.email }}</span>
            </div>

            <div 
                class="form-group"
                :class="{'has-error' : errors.password}"
            >
                <label for="password" class="control-label">Senha</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    class="form-control"
                    v-model="user.password"
                    autocomplete="off"
                    placeholder="Senha" />
                <span class="text-danger">{{ errors.password }}</span>
            </div>
        </div>  
        <div slot="footer">
            <button
                class="btn btn-success"
                type="submit"
                :disabled="ajaxInProgress"
            >
                Cadastrar
            </button>
        </div>
    </gp-modal-form>
</template>

<script>
import GpModalForm from '../modal-form/index.vue';

export default {
    components: {
        GpModalForm
    },
    data() {
        return {
            showModal: false,
            ajaxInProgress: false,
            user: {
                name: '',
                email: '',
                password: ''
            },
            errors: {
                name: '',
                email: '',
                password: ''
            }
        }
    },
    methods: {
        createUser() {
            if (this.ajaxInProgress) {
                return;
            }

            this.ajaxInProgress = true;
            this.$http.post('/admin/api/users', this.user).then((response) => {
                this.ajaxInProgress = false;
                this.resetErrors();
                this.showModal = false;
            }, (response) => {
                this.errors = response.data;
                this.ajaxInProgress = false;
            })
        },
        reset() {
            this.resetUser();
            this.resetErrors();
        },
        resetErrors() {
            this.errors = {
                name: '',
                email: '',
                password: ''
            }
        },
        resetUser() {
            this.user = {
                name: '',
                email: '',
                password: ''
            }
        }
    }
}
</script>