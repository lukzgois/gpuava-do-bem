<template>
    <div class="card">
        
        <gp-create-user></gp-create-user>

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
                        <a href="#">
                            <i class="fa fa-pencil fa-fw"></i>
                        </a>
                        <a href="#">
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
    import UserStore from '../../stores/user.js';

    export default {
        components: {
            GpPaginator, GpCreateUser
        },
        data() {
            return {
                users: UserStore.state.users,
                showCreateForm: false
            }
        },
        created() {
            UserStore.init();
        },
        methods: {
            loadPage(page) {
                UserStore.getPage(page);
            },
            showModalForm() {
                this.$broadcast('show-modal-form');
            }
        }
    }
</script>