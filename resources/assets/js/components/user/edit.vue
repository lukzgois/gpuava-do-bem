<template>
    <gp-modal-form 
        :show.sync="showModal"
        @show-edit-form="showModal = true"
        @modal-form-submited="editUser"
        @modal-form-closed="reset"
        @modal-form-opened="setUser"
    >
        <div slot="header">
            Editar Usuário: {{ user.name }}
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
        </div>  
        <div slot="footer">
            <button
                class="btn btn-success"
                type="submit"
                :disabled="ajaxInProgress"
            >
                Editar
            </button>
        </div>
    </gp-modal-form>
</template>

<script>
import GpModalForm from '../modal-form/index.vue';
import UserStore from '../../stores/user.js';

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
                email: ''
            },
            errors: {
                name: '',
                email: ''
            }
        }
    },
    methods: {
        setUser() {
            this.user = UserStore.current()
            console.log(UserStore.current());
            // this.user.name = UserStore.state.currentUser.name,
            // this.user.email = UserStore.state.currentUser.email
        },
        editUser() {
            console.log(UserStore.state.currentUser);
            if (this.ajaxInProgress) {
                return;
            }

            this.ajaxInProgress = true;
            this.$http.put('/admin/api/users/' + this.user.id, this.user).then((response) => {
                this.ajaxInProgress = false;
                this.reset();
                this.showModal = false;

                UserStore.getPage(1);
            }, (response) => {
                this.errors = response.data;
                this.ajaxInProgress = false;
            })
        },
        reset() {
            this.errors = {
                name: '',
                email: ''
            }
        }
    }
}
</script>