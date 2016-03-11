import HttpService from '../services/http.js';

export default {
    state: {
        users: {
            data: [],
            lastPage: 1,
            currentPage: 1
        }
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
    }
}