<template>
    <nav>
        <ul class="pagination">
            <li :class="{disabled: currentPage == 1}">
                <a href="#" @click.prevent="previousPage" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li 
                v-for="page in pages"
                :class="{active: currentPage == page}"
                @click.prevent="loadPage(page)"
            >
                <a href="#">{{ page }}</a>
            </li>
            <li :class="{disabled: currentPage == lastPage}">
                <a href="#" @click.prevent="nextPage" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</template>

<script>
    import _ from 'lodash';

    export default {
        data() {
            return {
                pages: []
            }
        },
        props: {
            currentPage: {
                default: 1
            },
            lastPage: {
                default: 1
            }
        },
        watch: {
            'lastPage': function() {
                this.pages = _.range(1, this.lastPage + 1)
            }
        },
        ready() {
            this.init()
        },
        methods: {
            init() {
                this.pages = _.range(1, this.lastPage +1);
            },
            loadPage(page) {
                if (this.currentPage == page) {
                    return;
                }

                this.currentPage = page;
                this.$dispatch('load-page', page);
            },
            previousPage() {
                if(this.currentPage == 1) {
                    return;
                }

                this.currentPage = this.currentPage - 1;
                this.$dispatch('load-page', this.currentPage);
            },
            nextPage() {
                if(this.currentPage == this.lastPage) {
                    return;
                }

                this.currentPage = this.currentPage + 1
                this.$dispatch('load-page', this.currentPage);
            }
        }

    }
</script>

<style scoped>
nav {
    text-align: center
}
</style>