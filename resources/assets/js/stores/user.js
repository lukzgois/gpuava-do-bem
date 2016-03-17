import HttpService from '../services/http.js';
import UserStub from '../stubs/user.js';

export default {
    state: {
        users: {
            data: [],
            lastPage: 1,
            currentPage: 1
        },
        currentUser: UserStub
    },
    init() {
        this.getPage(1);
    },
    getPage(page = 1) {
        HttpService.get('/admin/api/users?page=' + page, (response) => {
            this.state.users.data = response.data.data;
            this.state.users.lastPage = response.data.last_page;
            this.state.users.currentPage = response.data.current_page;
        });
    },
    current(user = null) {
        if (user) {
            this.state.currentUser = user;
        }
        return this.state.currentUser
    }
}