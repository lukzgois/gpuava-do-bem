<template>
    
    <div class="card">
        <form>
            <div class="form-group">
                <input
                    type="text"
                    class="form-control"
                    id="search"
                    v-model="search_term"
                    @keyup="search | debounce 500"
                    name="search"
                    placeholder="Buscar pelo nome ou email..">
            </div>
            <!-- TODO: put a button  to search -->
        </form>
    </div>

    <div class="card">
        
        <gp-create-user></gp-create-user>
        <gp-edit-user></gp-edit-user>

        <a 
            href="#"
            class="btn btn-primary pull-right"
            @click.prevent="showModalForm"
        >
            <i class="fa fa-plus-circle"></i>
            Cadastrar Usuário
        </a>
        
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users.data">
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td class="table__actions">
                        <a
                            href="#"
                            @click.prevent="edit(user)"
                        >
                            <i class="fa fa-pencil fa-fw"></i>
                        </a>
                        <a
                            href="#"
                            @click.prevent="remove(user)"
                        >
                            <i class="fa fa-trash fa-fw"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>

        <gp-paginator
            :last-page.sync="users.lastPage"
            :current-page.sync="users.currentPage"
            @load-page="loadPage"
        ></gp-paginator>

    </div>
</template>

<script>
    import GpPaginator from '../paginator/index.vue';
    import GpCreateUser from './create.vue';
    import GpEditUser from './edit.vue';
    import UserStore from '../../stores/user.js';
    import swal from 'sweetalert';

    export default {
        components: {
            GpPaginator, GpCreateUser, GpEditUser
        },
        data() {
            return {
                users: UserStore.state.users,
                showCreateForm: false,
                search_term: null,
                currentUser: {}
            }
        },
        created() {
            UserStore.init();
        },
        methods: {
            loadPage(page) {
                UserStore.getPage(page, this.search_term);
            },
            showModalForm() {
                this.$broadcast('show-create-form');
            },
            edit(user) {
                // TODO: fix bug when changing the user in the edit form changes in the list too!!
                UserStore.current(user);
                this.$broadcast('show-edit-form');
            },
            remove(user) {
                //TODO: implement the sweetalert confirm dialog
            },
            search() {
                UserStore.search(this.search_term);
            }
        }
    }
</script>